<?php

require_once __DIR__.'/autoload.php';

$data[0] = array(
    "name" => "Kirill",
    "phone" => "+79094869474"
);
$data[1] = array(
    "titleMovie" => "Venom 2",
    "date" => "10 October",
    "startTime" => "19:45"
);
$data[2] = array(
    "name" => "John",
    "phone" => "+79027869474"
);
$data[3] = array(
    "titleMovie" => "Venom 2",
    "date" => "10 October",
    "startTime" => "19:45"
);
$data[4] = array(
    "name" => "Michael",
    "phone" => "+79021879474"
);
$data[5] = array(
    "titleMovie" => "Venom 2",
    "date" => "10 October",
    "startTime" => "19:45"
);

try {
    $clientDto1 = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto1->load($data[0]);
    echo "Объект передачи данных клиента создан:\n";
    echo "Имя: " . $clientDto1->name . "\n";
    echo "Телефон: ". $clientDto1->phone ."\n";
    echo "\n";
    echo "\n";
    $movieShowDto1 = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto1->load($data[1]);
    echo "Объект передачи данных Киносеанса создан:\n";
    echo "Название фильма: " . $movieShowDto1->titleMovie . "\n";
    echo "Дата показа: ". $movieShowDto1->date ."\n";
    echo "Время начало показа: ". $movieShowDto1->startTime ."\n";
    echo "\n";
    echo "\n";
    $clientDto2 = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto2->load($data[2]);
    echo "Объект передачи данных клиента создан:\n";
    echo "Имя: " . $clientDto2->name . "\n";
    echo "Телефон: ". $clientDto2->phone ."\n";
    echo "\n";
    echo "\n";
    $movieShowDto2 = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto2->load($data[3]);
    echo "Объект передачи данных Киносеанса создан:\n";
    echo "Название фильма: " . $movieShowDto2->titleMovie . "\n";
    echo "Дата показа: ". $movieShowDto2->date ."\n";
    echo "Время начало показа: ". $movieShowDto2->startTime ."\n";
    echo "\n";
    echo "\n";
    $clientDto3 = new \App\Domain\Booking\Entity\TransferObject\ClientDto();
    $clientDto3->load($data[4]);
    echo "Объект передачи данных клиента создан:\n";
    echo "Имя: " . $clientDto3->name . "\n";
    echo "Телефон: ". $clientDto3->phone ."\n";
    echo "\n";
    echo "\n";
    $movieShowDto3 = new \App\Domain\Booking\Entity\TransferObject\MovieShowDto();
    $movieShowDto3->load($data[5]);
    echo "Объект передачи данных Киносеанса создан:\n";
    echo "Название фильма: " . $movieShowDto3->titleMovie . "\n";
    echo "Дата показа: ". $movieShowDto3->date ."\n";
    echo "Время начало показа: ". $movieShowDto3->startTime ."\n";
    echo "\n";
    echo "\n";
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
echo "    Начинается:" . $schedule->getStartAt() . "\n";
echo "    Заканчивается: " . $schedule->getEndAt() . "\n";
echo "\n";
echo "  Характеристики кинозала:\n";
$hall = $movieShow->getHall();
echo "    Общее кол-во мест: " . $hall->getNumberOfPlaces() . "\n";
echo "\n";
echo "\n";
try {
    $movieShow->bookPlace($clientDto1);
    $movieShow->bookPlace($clientDto2);
} catch (\DomainException $e) {
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
echo "    Начинается:" . $schedule->getStartAt() . "\n";
echo "    Заканчивается: " . $schedule->getEndAt() . "\n";
echo "\n";
echo "  Характеристики кинозала:\n";
$hall = $movieShow->getHall();
echo "    Общее кол-во мест:" . $hall->getNumberOfPlaces() . "\n";
echo "\n";
echo "  Проданные билеты:\n";
foreach ($movieShow->getTicketsCollectionIterator() as $item) {
    echo "    Индетификатор билета: " . $item->getId() . "\n";
    echo "    Информация о клиента: \n";
    $client = $item->getClient();
    echo "      Имя: " . $client->getName() . "\n";
    echo "      Телефон: " . $client->getPhone() . "\n";
    echo "      Название фильма: " . $item->getMovie() . " \n";
    echo "      Дата: " . $item->getDate() . "\n";
    echo "      Начианется в: " . $item->getStartTime() . "\n";
    echo "\n";
}
try {
    $movieShow->bookPlace($clientDto3);
} catch (\DomainException $e) {
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
echo "    Начинается:" . $schedule->getStartAt() . "\n";
echo "    Заканчивается: " . $schedule->getEndAt() . "\n";
echo "\n";
echo "  Характеристики кинозала:\n";
$hall = $movieShow->getHall();
echo "    Общее кол-во мест:" . $hall->getNumberOfPlaces() . "\n";
echo "\n";
echo "  Проданные билеты:\n";
foreach ($movieShow->getTicketsCollectionIterator() as $item) {
    echo "    Индетификатор билета: " . $item->getId() . "\n";
    echo "    Информация о клиента: \n";
    $client = $item->getClient();
    echo "      Имя: " . $client->getName() . "\n";
    echo "      Телефон: " . $client->getPhone() . "\n";
    echo "      Название фильма: " . $item->getMovie() . " \n";
    echo "      Дата: " . $item->getDate() . "\n";
    echo "      Начианется в: " . $item->getStartTime() . "\n";
    echo "\n";
}