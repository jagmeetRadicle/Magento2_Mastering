<?php
namespace Radicle\FirstModule\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Console\Cli;
use Radicle\FirstModule\Model\AuthorFactory;
class AddAuthor extends Command{
    const INPUT_KEY_AUTHOR_NAME = 'author_name';
    const INPUT_KEY_EMAIL = "email";

    const INPUT_KEY_DESCRIPTION = 'description';
    const INPUT_KEY_STORE_ID = "store_id";
    const INPUT_KEY_CUSTOMER_ID = "Customer Id";
    const INPUT_KEY_TIME_OCCURED = "time_occured";

    public $authorFactory;

    public function __construct(AuthorFactory $authorFactory)
    {
        $this->authorFactory = $authorFactory;
        parent::__construct();
    }

    protected function configure()  //configured my command
    {
        $this->setName("radicle:author:add")
            ->addArgument(
                self::INPUT_KEY_AUTHOR_NAME,
                InputArgument::REQUIRED,
                'Author name'
            )->addArgument(
                self::INPUT_KEY_EMAIL,
                InputArgument::REQUIRED,
                'Author Email'
            )->addArgument(
                self::INPUT_KEY_DESCRIPTION,
                InputArgument::REQUIRED,
                'Author DESCRIPTION'
            )->addArgument(
                self::INPUT_KEY_STORE_ID,
                InputArgument::REQUIRED,
                'Store Id'
            )->addArgument(
                self::INPUT_KEY_CUSTOMER_ID,
                InputArgument::OPTIONAL,
                'Customer Id'
            )->addArgument(
                self::INPUT_KEY_TIME_OCCURED,
                InputArgument::OPTIONAL,
                'Time Occured'
            );
        parent::configure();
    }

    protected function execute(InputInterface $input,OutputInterface $output)
    {
        $author= $this->authorFactory->create();
        $author->setAuthorName($input->getArgument(self::INPUT_KEY_AUTHOR_NAME));
        $author->setEmail($input->getArgument(self::INPUT_KEY_EMAIL));
        $author->setDescription($input->getArgument(self::INPUT_KEY_DESCRIPTION));
        $author->setStoreId($input->getArgument(self::INPUT_KEY_STORE_ID));
        $author->setCustomerId($input->getArgument(self::INPUT_KEY_CUSTOMER_ID));
        $currentTimeinSeconds = time();
        // converts the time in seconds to current date
        $currentDate = date('Y-m-d', $currentTimeinSeconds);
        $author->setTimeOccured($currentDate);
        $author->setIsObjectNew(true);
        $author->save();
        return Cli::RETURN_SUCCESS;
    }


}
