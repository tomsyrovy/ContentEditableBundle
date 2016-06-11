<?php
	/**
	 * Project: ContentEditableBundle
	 * File: DefaultControllerInterface.php
	 * Author: Tomas SYROVY <tomas@syrovy.pro>
	 * Date: 06.06.16
	 * Version: 1.0
	 */

	namespace tomsyrovy\Controller;


	use Symfony\Component\HttpFoundation\JsonResponse;

	interface DefaultControllerInterface {

		/**
		 * @param integer $contentEditable_id
		 *
		 * @return JsonResponse|null
		 */
		public function loadAction($contentEditable_id);

		/**
		 * @param integer $contentEditable_id
		 * @param string $content
		 *
		 * @return JsonResponse
		 */
		public function saveAction($contentEditable_id, $content);

	}