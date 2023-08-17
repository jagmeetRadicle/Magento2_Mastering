<?php
namespace Radicle\FirstModule\Cron;
use Psr\Log\LoggerInterface;

class SampleCron {
    protected $logger;
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }
    /**
     * Write to system.log
     *
     * @return void
     */
    public function execute() {
        $this->logger->info('Radicle module cron works');
    }
}
