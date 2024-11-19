<?php

namespace App\Service;

use App\Entity\Car;
use App\Entity\Truck;
use App\Entity\SpecMachine;
use Exception;

class CarService
{
    public function getCarList(string $filename): array
    {

        if (!file_exists($filename) || !is_readable($filename)) {
            throw new \RuntimeException("Файл не найден или недоступен.");
        }
        $cars = [];
        $i = 0;
        if (($handle = fopen($filename, 'rb')) !== false) {
            while (($data = fgetcsv($handle,null,';')) !== false) {
                $i++;
                if ($i === 1 || count($data) < 6) {
                    continue;
                }
                try {
                    $carType = strtolower($data[0]);
                    $brand = $data[1];
                    $photoFileName = $data[3];
                    $passengerSeatsCount = isset($data[2]) ? (int)$data[2] : null;
                    $body = isset($data[4]) ? $data[4] : null;
                    $carrying = (isset($data[5]) && is_numeric($data[5])) ? (float)$data[5] : null;
                    $extra = $data[6] ?? null;
                    switch ($carType) {
                        case 'car':
                            $car = new Car();
                            $car->setBrand($brand);
                            $car->setPhotoFileName($photoFileName);
                            $car->setPassengerSeatsCount($passengerSeatsCount);
                            $car->setCarrying($carrying);
                            break;

                        case 'truck':
                            $truck = new Truck();
                            $truck->setBrand($brand);
                            $truck->setPhotoFileName($photoFileName);
                            $truck->setCarrying($carrying);
                            $truck->setBodyDimensions($body);
                            break;

                        case 'spec_machine':
                            $specMachine = new SpecMachine();
                            $specMachine->setBrand($brand);
                            $specMachine->setPhotoFileName($photoFileName);
                            $specMachine->setCarrying($carrying);
                            $specMachine->setExtra($extra);
                            break;

                        default:
                            continue 2;
                    }
                    if (isset($car)) {
                        $cars[] = $car;
                        $car = null;
                    } elseif (isset($truck)) {
                        $cars[] = $truck;
                        $truck = null;
                    } elseif (isset($specMachine)) {
                        $cars[] = $specMachine;
                        $specMachine = null;
                    }

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }

            fclose($handle);
        }

        return $cars;
    }

}
