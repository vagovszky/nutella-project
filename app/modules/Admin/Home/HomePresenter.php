<?php declare(strict_types = 1);

namespace App\Modules\Admin\Home;

use App\Domain\Order\Event\OrderCreated;
use App\Modules\Admin\BaseAdminPresenter;
use Nette\Application\UI\Form;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Model\Database\EntityManager;
use Ublaboo\DataGrid\DataGrid;
use Nette\Localization\ITranslator;

final class HomePresenter extends BaseAdminPresenter {

    /** @var EventDispatcherInterface @inject */
    public $dispatcher;
    /** @var EntityManager @inject */
    public $entityManager;
    /** @var ITranslator @inject */
    public $translator;

    protected function createComponentOrderForm(): Form {
        $form = new Form();

        $form->addText('order', 'Order name')
                ->setRequired(true);
        $form->addSubmit('send', 'OK');

        $form->onSuccess[] = function (Form $form): void {
            $this->dispatcher->dispatch(new OrderCreated($form->values->order), OrderCreated::NAME);
        };

        return $form;
    }

    public function createComponentGrid(): DataGrid {
        $grid = new DataGrid;

        $grid->setDataSource($this->entityManager->getUserRepository()->findAll());

        $grid->setItemsPerPageList([20, 50, 100], true);

        $grid->addColumnText('email', 'E-mail')
                ->setSortable()
                ->setFilterText();

        $grid->addColumnText('username', 'User Name')
                ->setFilterText();

        $grid->setTranslator($this->translator);
       
        return $grid;
    }

}
