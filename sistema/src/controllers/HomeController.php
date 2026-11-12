<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agendamento;
use App\Models\Tutor;
use App\Models\Pet;


/*
 Controller da tela principal do sistema com menu de recursos e metricas.
 */
final class HomeController extends BaseController {
    public function index(): void {
        $usuarioNome = $_SESSION['usuario_nome'] ?? 'Operador';
        $totalTutores = count(Tutor::listar());
        $totalPets = Pet::totalPets();
        $agendamentosRecentes = array_slice(Agendamento::listarOrdenadoPorDia(), 0, 5);

        $this->renderizar('home/index', [
            'titulo'               => 'Painel Principal - Clínica Veterinária',
            'usuarioNome'          => $usuarioNome,
            'totalTutores'         => $totalTutores,
            'totalPets'            => $totalPets,
            'agendamentosRecentes' => $agendamentosRecentes
        ]);
    }
}