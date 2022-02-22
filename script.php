<?php
require_once __DIR__.'/autoload.php';
require_once __DIR__.'/vendor/autoload.php';

$data[0] = array(
    "name" => "Kirill",
    "phone" => "+79094869474"
);
$data[1] = array(
    "titleMovie" => "Venom 2",
    "startTime" => "2022-10-10 19:45"
);
$data[2] = array(
    "name" => "John",
    "phone" => "+79027869474"
);
$data[3] = array(
    "titleMovie" => "Venom 2",
    "startTime" => "2022-10-10 19:45"
);
$data[4] = array(
    "name" => "Michael",
    "phone" => "+79021879474"
);
$data[5] = array(
    "titleMovie" => "Venom 2",
    "startTime" => "2022-10-10 19:45"
);

try {
    $clientDto1 = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto1->load($data[0]);
    viewClientDto($clientDto1);
    $movieShowDto1 = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto1->load($data[1]);
    viewMovieShowDto($movieShowDto1);
    $clientDto2 = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto2->load($data[2]);
    viewClientDto($clientDto2);
    $movieShowDto2 = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto2->load($data[3]);
    viewMovieShowDto($movieShowDto2);
    $clientDto3 = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto3->load($data[4]);
    viewClientDto($clientDto3);
    $movieShowDto3 = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto3->load($data[5]);
    viewMovieShowDto($movieShowDto3);
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
    exit;
}

$repositoryMovieShow = new \App\Domain\Helpers\MovieShowRepository();
try {
    $movieShow = $repositoryMovieShow->findByTitleMovieAndSchedule($movieShowDto1);
} catch (\DomainException $e) {
    echo $e->getMessage();
    exit;
}
echo "Найдена сущность киносеанса.\n";
echo "\n";
echo "Данные до бронирования:\n";
viewMovieShow($movieShow);
try {
    $movieShow->bookPlace($clientDto1);
    $movieShow->bookPlace($clientDto2);
} catch (\DomainException $e) {
    echo $e->getMessage();
    exit;
}
echo "Приобритен новый билет\n";
viewMovieShow($movieShow);
try {
    $movieShow->bookPlace($clientDto3);
} catch (\DomainException $e) {
    echo $e->getMessage();
    exit;
}
echo "Приобритен новый билет\n";
viewMovieShow($movieShow);

function viewClientDto(\App\Domain\Booking\Entity\TransferObject\ClientDto $clientDto)
{
    echo "Объект передачи данных клиента создан:\n";
    echo "Имя: " . $clientDto->name . "\n";
    echo "Телефон: ". $clientDto->phone ."\n";
    echo "\n";
    echo "\n";
}

function viewMovieShowDto(\App\Domain\Booking\Entity\TransferObject\MovieShowDto $movieShowDto)
{
    echo "Объект передачи данных Киносеанса создан:\n";
    echo "Название фильма: " . $movieShowDto->titleMovie . "\n";
    echo "Дата показа: ". $movieShowDto->startTime->format("j F") ."\n";
    echo "Время начало показа: ". $movieShowDto->startTime->format("H:i") ."\n";
    echo "\n";
    echo "\n";
}

function viewMovieShow(\App\Domain\Booking\Entity\MovieShow $movieShow)
{
    $movieShowInfo = $movieShow->getMovieShowInfo();
    echo "\n";
    echo "  Данные фильма:\n";
    echo "    Название: ". $movieShowInfo->getTitle() ."\n";
    echo "    Продолжительность: ". $movieShowInfo->getDuration()->format("%h:%i") ."\n";
    echo "\n";
    echo "  Расписание киносеанса:\n";
    echo "    Дата:" . $movieShowInfo->getStartAt()->format("j F") . "\n";
    echo "    Начинается:" . $movieShowInfo->getStartAt()->format("H:i") . "\n";
    echo "    Заканчивается: " . $movieShowInfo->getEndAt()->format("H:i") . "\n";
    echo "\n";
    echo "  Характеристики кинозала:\n";
    echo "    Кол-во свободных мест: " . $movieShowInfo->getFreePlace() . "\n";
    echo "  Проданные билеты:\n";
    foreach ($movieShow->getTicketsCollectionIterator() as $item) {
        viewTicket($item);
    }
    echo "\n";
    echo "\n";
}

function viewTicket(\App\Domain\Booking\Entity\Ticket $ticket)
{
    echo "    Индетификатор билета: " . $ticket->getId() . "\n";
    echo "    Информация о клиента: \n";
    echo "      Имя: " . $ticket->getCustomerName() . "\n";
    echo "      Телефон: " . $ticket->getCustomerPhone() . "\n";
    echo "      Название фильма: " . $ticket->getMovie() . " \n";
    echo "      Дата: " . $ticket->getStartTime()->format("j F") . "\n";
    echo "      Начианется в: " . $ticket->getStartTime()->format("H:i") . "\n";
    echo "\n";
}
