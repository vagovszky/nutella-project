<?php declare(strict_types = 1);

namespace App\Modules\Base;

use App\Model\Latte\TemplateProperty;
use App\Model\Security\SecurityUser;
use App\UI\Control\TFlashMessage;
use App\UI\Control\TModuleUtils;
use Contributte\Application\UI\Presenter\StructuredTemplates;
use Nette\Application\UI\Presenter;
use WebLoader\Engine;

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

    public function __construct(Engine $engine) {
	$this->webloader = $engine;
    }

    public function beforeRender() {
	$this->template->setParameters([
	    'webloaderFilesCollectionRender' => $this->webloader->getFilesCollectionRender()
	]);
    }

}
