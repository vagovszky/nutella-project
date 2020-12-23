<?php declare(strict_types = 1);

namespace App\Modules\Base;

use App\Model\Latte\TemplateProperty;
use App\Model\Security\SecurityUser;
use App\UI\Control\TFlashMessage;
use App\UI\Control\TModuleUtils;
use Contributte\Application\UI\Presenter\StructuredTemplates;
use Nette\Application\UI\Presenter;
use WebLoader\Engine;
use Nette\Localization\ITranslator;
use App\Model\App;

/**
 * @property-read TemplateProperty $template
 * @property-read SecurityUser $user
 */
abstract class BasePresenter extends Presenter {

    use StructuredTemplates;
    use TFlashMessage;
    use TModuleUtils;

    /**
     * @var Engine
     */
    private $webloader;
    
    /** @var ITranslator */
    public $translator;
    
    /** @persistent */
    public $locale;

    public function __construct(Engine $engine, ITranslator $translator) {
	$this->webloader = $engine;
	$this->translator = $translator;
    }

    public function beforeRender() {
	
	parent::beforeRender();
	
	$this->template->add('webloaderFilesCollectionRender', $this->webloader->getFilesCollectionRender());
	$this->template->add('version', App::APP_VERSION);

    }

}
