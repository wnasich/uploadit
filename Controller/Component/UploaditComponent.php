<?php
/**
 * Uploadit Plugin
 *
 * Uploadit Component
 *
 * @package uploadit
 * @subpackage uploadit.controllers.components
 */
App::uses('Component', 'Controller');
App::uses('CakeSession', 'Model/Datasource');

class UploaditComponent extends Component {
	/**
	 * Base model
	 *
	 * @var string
	 */
	protected $baseModel = 'Attachment';

	/**
	 * Target model
	 *
	 * @var string
	 */
	protected $targetModel = 'Attachment';

	/**
	 * Has many
	 *
	 * @var boolean
	 */
	protected $hasMany = true;

	/**
	 * Startup
	 *
	 * @param object Controller instance
	 * @return void
	 */
	public function startUp(Controller $Controller) {
		$assemblies = array();

		if (!empty($Controller->request->data['transloadit'])) {
			$transloadit = json_decode($Controller->request->data['transloadit'], true);

			if (!empty($transloadit['ok']) && $transloadit['ok'] === 'ASSEMBLY_COMPLETED') {
				CakeSession::write('Uploadit.assembly.' . $transloadit['assembly_id'], $transloadit);

				if (!empty($Controller->request->data['Uploadit']['assemblies'])) {
					$assemblies = json_decode($Controller->request->data['Uploadit']['assemblies'], true);
				}
				$assemblies[] = $transloadit['assembly_id'];
				$Controller->request->data['Uploadit']['assemblies'] = json_encode($assemblies);
			}
		}

		foreach ($assemblies as $assemblyId) {
			$assemblyData = CakeSession::read('Uploadit.assembly.' . $assemblyId);
			$data = array();
			if ($assemblyData) {
				foreach($assemblyData['results'] as $version => $results) {
					foreach($results as $resultData) {
						$data[$resultData['original_id']][$version] = $resultData;
						$data[$resultData['original_id']]['name'] = $resultData['name'];
					}
				}

				$Controller->request->data[$this->targetModel] = array();
				foreach ($data as $originalId => $result) {
					$file = array(
						'name' => $result['name'],
						'model' => $this->baseModel,
						'template_id' => $transloadit['template_id'],
						'assembly_id' => $transloadit['assembly_id'],
						'original_id' => $originalId,
						'status' => $transloadit['ok'],
						'versions' => json_encode($result),
					);
					if ($this->hasMany) {
						$Controller->request->data[$this->targetModel][] = $file;
					} else {
						$Controller->request->data[$this->targetModel] = $file;
					}
				}
			}
		}

	}

	public function beforeRender(Controller $controller) {
		$controller->set('uploaditMultiple', $this->hasMany);
	}

}
