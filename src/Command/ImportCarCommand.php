<?php

namespace App\Command;

use App\Service\CarService;
use Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: "import-car")]
class ImportCarCommand extends Command
{
    protected static string $defaultName = 'import-car';

    private carService $carService;
    public function __construct(CarService $carService, ?string $name = null)
    {
        parent::__construct($name);
        $this->carService = $carService;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fn = __DIR__ . "/var/import-car.csv";
        try {
            $cars = $this->carService->getCarList($fn);
            var_dump($cars);

        } catch (Exception $e) {
            $output->writeln('Process do not finish!');
        }

        return Command::SUCCESS;
    }

}
