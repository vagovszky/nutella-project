<?php declare(strict_types = 1);

namespace App\UI\Form;

use Contributte\FormsBootstrap\Enums\RenderMode;
use Nette\Localization\ITranslator;

final class FormFactory
{

	/** @var ITranslator */
	public $translator;
    
	public function __construct(ITranslator $translator) {
		$this->translator = $translator;
	}
	
	private function create(): BaseForm
	{
		$baseForm = new BaseForm();
		$baseForm->renderMode = RenderMode::VERTICAL_MODE;
		$baseForm->setTranslator($this->translator);
		return $baseForm;
	}

	public function forFrontend(): BaseForm
	{
		return $this->create();
	}

	public function forBackend(): BaseForm
	{
		return $this->create();
	}

}
