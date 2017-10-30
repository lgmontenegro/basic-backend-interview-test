<?php
// src/AppBundle/Command/NearEarthObjectCommand.php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Unirest;

Class NearEarthObjectCommand extends Command
{
    protected function configure() {
        $this->setName('app:get-neo')
                ->setDescription("Get Near objects from Earth from 3 days before");
    }
    
    protected function execute(InputInterface $input, OutputInterface $output) {
        $headers = array('Accept' => 'application/json');
        //$query = array('start_date'=>'2015-09-07','end_date'=>'2015-09-08','api_key'=>'ARqO9NiworcZgcmwA2RlD8zc8qllqG3uwj5smh1O');
        $query = array('start_date'=>'2015-09-07','end_date'=>'2015-09-08','api_key'=>'N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD');
        $response = Unirest\Request::get('https://api.nasa.gov/neo/rest/v1/feed', $headers, $query);
        $output->writeln($response->code);
        //$output->writeln($response->raw_body);
    }
}