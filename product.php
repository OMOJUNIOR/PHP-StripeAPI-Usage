<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
require __DIR__.'/vendor/autoload.php';
use Omojunior\PhpStripeApiUsage\controller\HomeController;

$home = new HomeController();
$items = $home->showProduct();
?>
<?php if (empty($items)) { ?>
    <h1>No items found</h1>
<?php } else { ?>
<?php foreach ($items as $item) { ?>
<div class="py-16 px-4 md:px-6 2xl:px-0 flex justify-center items-center 2xl:mx-auto 2xl:container">
            <div class="flex flex-col justify-start items-start w-full space-y-9">
                <div class="flex flex-col xl:flex-row justify-center xl:justify-between space-y-6 xl:space-y-0 xl:space-x-6 w-full">
                    <div class="xl:w-3/5 flex flex-col sm:flex-row xl:flex-col justify-center items-center bg-gray-100 dark:bg-gray-800 py-7 sm:py-0 xl:py-10 px-10 xl:w-full">
                        <div class="flex flex-col justify-start items-start w-full space-y-4">
                            <p class="text-xl md:text-2xl leading-normal text-gray-800 dark:text-gray-50"><?php echo $item['name']; ?></p>
                            <p class="text-base font-semibold leading-none text-gray-600 dark:text-white">$<?php echo $item['price']; ?></p>
                            <p class="text-base font-semibold leading-none text-gray-600 dark:text-white"><?php echo $item['description']; ?></p>
                        </div>
                        <div class="mt-6 sm:mt-0 xl:my-10 xl:px-20 w-52 sm:w-96 xl:w-auto">
                            <img src="./images.png" alt="stripe payment" />
                        </div>
                    </div>
    
                    <div class="p-8 bg-gray-100 dark:bg-gray-800 flex flex-col lg:w-full xl:w-3/5">
                    <form action="payment.php" method="post">
                        <div class="border border-transparent hover:border-gray-300 bg-gray-900 dark:bg-white dark:hover:bg-gray-900 dark:hover:border-gray-900 dark:text-gray-900 dark:hover:text-white hover:bg-white text-white hover:text-gray-900 flex flex-row justify-center items-center space-x-2 py-4 rounded w-full">
                      <input type="submit" name="submit" value="Buy Now">   
                      </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
 <?php } ?>
<?php } ?>  
</body>
</html>