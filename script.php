<?php

require_once __DIR__.'/autoload.php';

$data = array(
    "name" => "Alex",
    "phone" => "+79021869474"
);
$data2 = array(
    "titleMovie" => "Venom2",
    "date" => "10 октября",
    "startTime" => "19:45"
);

try {
    $clientDto = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto->load($data);
    echo "Объект передачи данных клиента создан:\n";
    echo "Имя: " . $clientDto->name . "\n";
    echo "Телефон: ". $clientDto->phone ."\n";
    echo "\n";
    echo "\n";
    $movieShowDto = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto->load($data2);
    echo "Объект передачи данных Киносеанса создан:\n";
    echo "Название фильма: " . $movieShowDto->titleMovie . "\n";
    echo "Дата показа: ". $movieShowDto->date ."\n";
    echo "Время начало показа: ". $movieShowDto->startTime ."\n";
    echo "\n";
    echo "\n";
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
    exit;
}

$repositoryMovieShow = new \App\Domain\Helpers\MovieShowRepository();
$movieShow = $repositoryMovieShow->findByTitleMovieAndSchedule($movieShowDto);
echo "Найдена сущность киносеанса.\n";
echo "\n";
echo "Данные до бронирования:\n";
echo "\n";
echo "  Индетификатор киносеанса: " . $movieShow->getId() . "\n";
echo "\n";
echo "  Данные фильма:\n";
$movie = $movieShow->getMovie();
echo "    Название: ". $movie->getTitle() ."\n";
echo "    Продолжительность: ". $movie->getDuration() ."\n";
echo "\n";
echo "  Расписание киносеанса:\n";
$schedule = $movieShow->getSchedule();
echo "    Дата:" . $schedule->getDate() . "\n";
echo "    Начинается:" . $schedule->getStartTime() . "\n";
echo "    Заканчивается: " . $schedule->getEndTime() . "\n";
echo "\n";
echo "  Характеристики кинозала:\n";
$hall = $movieShow->getHall();
echo "    Общее кол-во мест" . $hall->getNumberOfPlaces() . "\n";
echo "\n";
echo "  Проданные билеты:\n";
$ticketsCollection = $movieShow->getTicketsCollection();
foreach ($ticketsCollection->getIterator() as $item) {
    echo "    Индетификатор билета: " . $item->getId() . "\n";
    echo "    Информация о клиента: \n";
    $client = $item->getClient();
    echo "      Имя: " . $client->getName() . "\n";
    echo "      Телефон: " . $client->getPhone() . "\n";
    echo "      Название фильма: " . $item->getMovie() . " \n";
    echo "      Дата: " . $item->getDate() . "\n";
    echo "      Начианется в : " . $item->getStartTime() . "\n";
    echo "\n";
}
$client = new \App\Domain\Booking\Entity\ValueObject\Client($clientDto->name, $clientDto->phone);
$movieShowTicket = new \App\Domain\Helpers\MovieShowService();
try {
    $movieShowTicket->createTicket($movieShow, $client);
} catch (\Exception $e) {
    echo $e->getMessage();
    exit;
}
echo "Приобритен новый билет\n";
echo "\n";
echo "Обновленная информаия по сеансу\n";
echo "\n";
echo "  Индетификатор киносеанса: " . $movieShow->getId() . "\n";
echo "\n";
echo "  Данные фильма:\n";
$movie = $movieShow->getMovie();
echo "    Название: ". $movie->getTitle() ."\n";
echo "    Продолжительность: ". $movie->getDuration() ."\n";
echo "\n";
echo "  Расписание киносеанса:\n";
$schedule = $movieShow->getSchedule();
echo "    Дата:" . $schedule->getDate() . "\n";
echo "    Начинается:" . $schedule->getStartTime() . "\n";
echo "    Заканчивается: " . $schedule->getEndTime() . "\n";
echo "\n";
echo "  Характеристики кинозала:\n";
$hall = $movieShow->getHall();
echo "    Общее кол-во мест" . $hall->getNumberOfPlaces() . "\n";
echo "\n";
echo "  Проданные билеты:\n";
$ticketsCollection = $movieShow->getTicketsCollection();
foreach ($ticketsCollection->getIterator() as $item) {
    echo "    Индетификатор билета: " . $item->getId() . "\n";
    echo "    Информация о клиента: \n";
    $client = $item->getClient();
    echo "      Имя: " . $client->getName() . "\n";
    echo "      Телефон: " . $client->getPhone() . "\n";
    echo "      Название фильма: " . $item->getMovie() . " \n";
    echo "      Дата: " . $item->getDate() . "\n";
    echo "      Начианется в : " . $item->getStartTime() . "\n";
    echo "\n";
}