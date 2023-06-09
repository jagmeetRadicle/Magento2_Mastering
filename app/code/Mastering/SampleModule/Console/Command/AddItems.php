<?php
namespace Mastering\SampleModule\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Console\Cli;
use Mastering\SampleModule\Model\ItemFactory ;
class AddItems extends Command{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_CONTENT = 'content';

    public $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    protected function configure()  //configured my command
    {
        $this->setName("mastering:item:add")
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Item name'
            )->addArgument(
                self::INPUT_KEY_CONTENT,
                InputArgument::OPTIONAL,
                'Item Content'
            );
        parent::configure();
    }

    protected function execute(InputInterface $input,OutputInterface $output)
    {
       $item = $this->itemFactory->create();
       $item->setName($input->getArgument(self::INPUT_KEY_NAME));
       $item->setContent($input->getArgument(self::INPUT_KEY_CONTENT));
       $item->setIsObjectNew(true);
       $item->save();
       return Cli::RETURN_SUCCESS;
    }


}
