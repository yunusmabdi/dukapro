<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [];

        $counter = 1;

        $categories = [

            // =====================================================
            // BEVERAGES (Category 1 | Supplier 1)
            // =====================================================

            [
                'category_id' => 1,
                'supplier_id' => 1,
                'products' => [
                    ['Coca-Cola Original 500ml','Coca-Cola','Bottle',55,80,'coca-cola-original-500ml.jpg'],
                    ['Coca-Cola Zero 500ml','Coca-Cola','Bottle',55,80,'coca-cola-zero-500ml.jpg'],
                    ['Fanta Orange 500ml','Fanta','Bottle',55,80,'fanta-orange-500ml.jpg'],
                    ['Sprite 500ml','Sprite','Bottle',55,80,'sprite-500ml.jpg'],
                    ['Krest Bitter Lemon 300ml','Krest','Bottle',60,90,'krest-bitter-lemon.jpg'],
                    ['Minute Maid Mango 400ml','Minute Maid','Bottle',70,100,'minute-maid-mango.jpg'],
                    ['Dasani Water 1L','Dasani','Bottle',45,70,'dasani-1l.jpg'],
                    ['Predator Energy Drink','Predator','Can',85,120,'predator.jpg'],
                    ['Stoney Tangawizi 500ml','Stoney','Bottle',60,90,'stoney-500ml.jpg'],
                    ['Schweppes Tonic 300ml','Schweppes','Bottle',65,95,'schweppes-tonic.jpg'],
                ]
            ],

            // =====================================================
            // GROCERIES (Category 2 | Supplier 2)
            // =====================================================

            [
                'category_id' => 2,
                'supplier_id' => 2,
                'products' => [
                    ['Unga Maize Flour 2kg','Jogoo','Pack',145,180,'unga-2kg.jpg'],
                    ['Hostess Wheat Flour 2kg','Hostess','Pack',170,210,'hostess-2kg.jpg'],
                    ['Pishori Rice 2kg','Pishori','Pack',280,350,'pishori-2kg.jpg'],
                    ['Sunlit Salt 1kg','Sunlit','Pack',45,65,'sunlit-salt.jpg'],
                    ['Ndume Beans 2kg','Ndume','Pack',250,320,'beans-2kg.jpg'],
                    ['Ajab Maize Flour 2kg','Ajab','Pack',150,185,'ajab-2kg.jpg'],
                    ['Brown Sugar 2kg','Mumias','Pack',240,300,'brown-sugar.jpg'],
                    ['White Sugar 2kg','Kabras','Pack',230,290,'white-sugar.jpg'],
                    ['Blue Band 500g','Blue Band','Tub',220,280,'blueband.jpg'],
                    ['Prestige Margarine 250g','Prestige','Tub',120,160,'prestige.jpg'],
                ]
            ],

            // =====================================================
            // SNACKS (Category 3 | Supplier 3)
            // =====================================================

            [
                'category_id' => 3,
                'supplier_id' => 3,
                'products' => [
                    ['Potato Crisps Salted','Kenafric','Pack',80,120,'crisps-salted.jpg'],
                    ['Potato Crisps Chilli','Kenafric','Pack',80,120,'crisps-chilli.jpg'],
                    ['Chevda 200g','Kenafric','Pack',90,130,'chevda.jpg'],
                    ['Chocolate Cookies','Kenafric','Pack',95,140,'cookies.jpg'],
                    ['Digestive Biscuits','Kenafric','Pack',110,160,'digestive.jpg'],
                    ['Chocolate Bar','Kenafric','Bar',70,100,'chocolate-bar.jpg'],
                    ['Lollipop Mix','Kenafric','Pack',60,90,'lollipop.jpg'],
                    ['Bubble Gum','Kenafric','Pack',40,70,'bubble-gum.jpg'],
                    ['Salted Peanuts 250g','Kenafric','Pack',100,150,'peanuts.jpg'],
                    ['Popcorn Butter','Kenafric','Pack',85,125,'popcorn.jpg'],
                ]
            ],

            // =====================================================
            // PERSONAL CARE (Category 4 | Supplier 4)
            // =====================================================

            [
                'category_id' => 4,
                'supplier_id' => 4,
                'products' => [
                    ['Lux Soap Pink','Lux','Bar',80,120,'lux-pink.jpg'],
                    ['Lux Soap White','Lux','Bar',80,120,'lux-white.jpg'],
                    ['Lifebuoy Soap','Lifebuoy','Bar',85,125,'lifebuoy.jpg'],
                    ['Close-Up Toothpaste','Close-Up','Tube',120,180,'closeup.jpg'],
                    ['Pepsodent Toothpaste','Pepsodent','Tube',120,180,'pepsodent.jpg'],
                    ['Sunsilk Shampoo','Sunsilk','Bottle',250,340,'sunsilk.jpg'],
                    ['Dove Shampoo','Dove','Bottle',320,430,'dove-shampoo.jpg'],
                    ['Vaseline Lotion 400ml','Vaseline','Bottle',450,600,'vaseline.jpg'],
                    ['Rexona Roll On','Rexona','Bottle',260,350,'rexona.jpg'],
                    ['Signal Toothbrush','Signal','Piece',80,120,'signal-brush.jpg'],
                ]
            ],

            // =====================================================
            // HOUSEHOLD (Category 5 | Supplier 5)
            // =====================================================

            [
                'category_id' => 5,
                'supplier_id' => 5,
                'products' => [
                    ['Gele Dishwashing Liquid','Gele','Bottle',170,240,'gele.jpg'],
                    ['Power Boy Soap','Power Boy','Bar',75,110,'powerboy.jpg'],
                    ['White Wash Detergent','White Wash','Pack',180,260,'whitewash.jpg'],
                    ['Jik Bleach 750ml','Jik','Bottle',150,220,'jik.jpg'],
                    ['Harpic Toilet Cleaner','Harpic','Bottle',220,300,'harpic.jpg'],
                    ['Air Freshener Lemon','Glade','Can',300,420,'air-freshener.jpg'],
                    ['Kitchen Towels','Nice & Soft','Pack',180,260,'kitchen-towel.jpg'],
                    ['Toilet Tissue 10 Pack','Nice & Soft','Pack',420,550,'toilet-paper.jpg'],
                    ['Garbage Bags Large','Bidco','Pack',160,230,'garbage-bags.jpg'],
                    ['Scouring Pad','Scotch Brite','Piece',45,70,'scouring-pad.jpg'],
                ]
            ],

        ];

        foreach ($categories as $category) {

            foreach ($category['products'] as $item) {

                $products[] = [

                    'sku' => 'PRD' . str_pad($counter, 6, '0', STR_PAD_LEFT),

                    'barcode' => '628' . str_pad($counter, 9, '0', STR_PAD_LEFT),

                    'name' => $item[0],

                    'category_id' => $category['category_id'],

                    'supplier_id' => $category['supplier_id'],

                    'brand' => $item[1],

                    'unit' => $item[2],

                    'cost_price' => $item[3],

                    'selling_price' => $item[4],

                    'stock' => rand(20,150),

                    'min_stock' => 10,

                    'status' => 'Active',

                    'image' => $item[5],

                ];

                $counter++;

            }

        }

        $this->db->table('products')->insertBatch($products);

    }
}