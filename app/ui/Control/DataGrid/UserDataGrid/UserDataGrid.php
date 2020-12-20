<?php declare(strict_types=1);

namespace App\UI\Control\DataGrid\UserDataGrid;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Nette\Localization\ITranslator;
use App\UI\Control\BaseDataGrid;

use App\UI\Control\BaseControl;

class UserDataGrid extends BaseControl
{
    /** @var ITranslator */
    protected $translator;

    /** @var EntityManager */
    protected $entityManager;

    /**
     * @param ITranslator            $translator
     * @param EntityManagerInterface $entityManager
     * @param \Nette\Security\User              $user
     */
    public function __construct(ITranslator $translator, EntityManagerInterface $entityManager)
    {
        $this->translator = $translator;
        $this->entityManager = $entityManager;
    }

    /**
     * @throws \ReflectionException
     */
    public function render(): void
    {
        $this->getTemplate()
            ->setFile(__DIR__ . DIRECTORY_SEPARATOR . 'grid.latte')
            ->render();
    }
    /**
     * @return BaseDataGrid
     */
    public function createComponentGrid(): BaseDataGrid
    {
        $datagrid = new BaseDataGrid();
        $datagrid->setTranslator($this->translator);
	$datagrid->setDataSource($this->entityManager->getUserRepository()->findAll());
        $datagrid->addColumnText('name', 'name')->setFilterText();
        $datagrid->addColumnText('surname', 'surname')->setFilterText();
        $datagrid->addColumnText('email', 'email')->setFilterText();
	$datagrid->addColumnText('username', 'username')->setFilterText();
	$datagrid->addColumnText('role', 'role')->setFilterText();
	

        return $datagrid;
    }

   
}
