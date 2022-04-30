<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Project;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\ProjectRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    protected $projectRepository;
    protected $categoryRepository;
    public function __construct(
        ProjectRepository $projectRepository,
        CategoryRepository $categoryRepository)
   {
        $this->projectRepository = $projectRepository;
        $this->categoryRepository = $categoryRepository;
   }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'countAllProject' => $this->projectRepository->countAllProject(),
            'countAllCategory' => $this->categoryRepository->countAllCategory()

        ]);
        #return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('StoreOfProject');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Home', 'fa fa-home');
        yield MenuItem::linkToCrud('Project', 'fas fa-tasks', Project::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-layer-group', Category::class);
        #yield MenuItem::linkToCrud('User', 'fas fa-layer-group', User::class);
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('bundles/easyadmin/css/style.css');
    }

}
