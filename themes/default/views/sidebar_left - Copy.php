<div id="sidebar-left">
  <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
    <ul class="nav main-menu">
      <li class="mm_welcome"> <a href="<?= site_url() ?>"> <i class="fa fa-dashboard"></i> <span class="text">
        <?= lang('dashboard'); ?>
        </span> </a> </li>
  <?php if(hasAccess(4,0)) { ?>
      <li class="mm_products"> <a class="dropmenu" href="#"> <i class="fa fa-barcode"></i> <span class="text">
        <?= lang('products'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
         <?php if(hasAccess(4,9)) { ?>
          <li id="products_index"> <a class="submenu" href="<?= site_url('products'); ?>"> <i class="fa fa-barcode"></i> <span class="text">
            <?= lang('list_products'); ?>
            </span> </a> </li>
            <?php }?>
              <?php if(hasAccess(4,6)) { ?>
          <li id="products_add"> <a class="submenu" href="<?= site_url('products/add'); ?>"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_product'); ?>
            </span> </a> </li>
            <?php }?>
            <?php if(hasAccess(4,19)) { ?>
          <li id="products_import_csv"> <a class="submenu" href="<?= site_url('products/import_csv'); ?>"> <i class="fa fa-file-text"></i> <span class="text">
            <?= lang('import_products'); ?>
            </span> </a> </li>
            <?php }?>
            <?php if(hasAccess(4,17)) { ?>
          <li id="products_quantity_adjustments"> <a class="submenu" href="<?= site_url('products/quantity_adjustments'); ?>"> <i class="fa fa-filter"></i> <span class="text">
            <?= lang('quantity_adjustments'); ?>
            </span> </a> </li>
            <?php }?>
              <?php if(hasAccess(4,16)) { ?>
          <li id="products_print_barcodes"> <a class="submenu" href="<?= site_url('products/print_barcodes'); ?>"> <i class="fa fa-tags"></i> <span class="text">
            <?= lang('print_barcode_label'); ?>
            </span> </a> </li>
            <?php }?>
        </ul>
      </li>
      <?php }?>
      
      <?php if(hasAccess(5,0)) { ?>
      <li class="mm_sales <?= strtolower($this->router->fetch_method()) == 'settings' ? '' : 'mm_pos' ?>"> <a class="dropmenu" href="#"> <i class="fa fa-heart"></i> <span class="text">
        <?= lang('sales'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
        <?php if(hasAccess(5,9)) { ?>
          <li id="sales_index"> <a class="submenu" href="<?= site_url('sales'); ?>"> <i class="fa fa-heart"></i> <span class="text">
            <?= lang('list_sales'); ?>
            </span> </a> </li>
            <?php }?>
          <?php if (POS) { ?>
          <?php if(hasAccess(14,9)) { ?>
          <li id="pos_sales"> <a class="submenu" href="<?= site_url('pos/sales'); ?>"> <i class="fa fa-heart"></i> <span class="text">
            <?= lang('pos_sales'); ?>
            </span> </a> </li>
            <?php }?>
          <?php } ?>
           <?php if(hasAccess(5,9)) { ?>
          <li id="sales_add"> <a class="submenu" href="<?= site_url('sales/add'); ?>"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_sale'); ?>
            </span> </a> </li>
            <?php }?>
            <?php if(hasAccess(5,23)) { ?>
          <li id="sales_sale_by_csv"> <a class="submenu" href="<?= site_url('sales/sale_by_csv'); ?>"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_sale_by_csv'); ?>
            </span> </a> </li>
            <?php }?>
             <?php if(hasAccess(6,0)) { ?>
          <li id="sales_deliveries"> <a class="submenu" href="<?= site_url('sales/deliveries'); ?>"> <i class="fa fa-truck"></i> <span class="text">
            <?= lang('deliveries'); ?>
            </span> </a> </li>
            <?php }?>
              <?php if(hasAccess(7,0)) { ?>
          <li id="sales_gift_cards"> <a class="submenu" href="<?= site_url('sales/gift_cards'); ?>"> <i class="fa fa-gift"></i> <span class="text">
            <?= lang('list_gift_cards'); ?>
            </span> </a> </li> <?php }?>
        </ul>
      </li>
      <?php }?>
      
      <?php if(hasAccess(8,0)) { ?>
      <li class="mm_quotes"> <a class="dropmenu" href="#"> <i class="fa fa-heart-o"></i> <span class="text">
        <?= lang('quotes'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
        <?php if(hasAccess(8,9)) { ?>
          <li id="quotes_index"> <a class="submenu" href="<?= site_url('quotes'); ?>"> <i class="fa fa-heart-o"></i> <span class="text">
            <?= lang('list_quotes'); ?>
            </span> </a> </li>
            <?php }?>
            <?php if(hasAccess(8,6)) { ?>
          <li id="quotes_add"> <a class="submenu" href="<?= site_url('quotes/add'); ?>"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_quote'); ?>
            </span> </a> </li>
            <?php }?>
        </ul>
      </li>
      <?php }?>
      
      <?php if(hasAccess(9,0)) { ?>
      <li class="mm_purchases"> <a class="dropmenu" href="#"> <i class="fa fa-star"></i> <span class="text">
        <?= lang('purchases'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
        <?php if(hasAccess(9,9)) { ?>
          <li id="purchases_index"> <a class="submenu" href="<?= site_url('purchases'); ?>"> <i class="fa fa-star"></i> <span class="text">
            <?= lang('list_purchases'); ?>
            </span> </a> </li>
            <?php }?>
            <?php if(hasAccess(9,6)) { ?>
          <li id="purchases_add"> <a class="submenu" href="<?= site_url('purchases/add'); ?>"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_purchase'); ?>
            </span> </a> </li> <?php }?>
            <?php if(hasAccess(9,23)) { ?>
          <li id="purchases_purchase_by_csv"> <a class="submenu" href="<?= site_url('purchases/purchase_by_csv'); ?>"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_purchase_by_csv'); ?>
            </span> </a> </li><?php }?>
            <?php if(hasAccess(15,0)) { ?>
          <li id="purchases_expenses"> <a class="submenu" href="<?= site_url('purchases/expenses'); ?>"> <i class="fa fa-dollar"></i> <span class="text">
            <?= lang('list_expenses'); ?>
            </span> </a> </li><?php }?>
            <?php if(hasAccess(15,6)) { ?>
          <li id="purchases_add_expense"> <a class="submenu" href="<?= site_url('purchases/add_expense'); ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i> <span class="text">
            <?= lang('add_expense'); ?>
            </span> </a> </li><?php }?>
        </ul>
      </li>
      <?php }?>
      
      <?php if(hasAccess(10,0)) { ?>
      <li class="mm_transfers"> <a class="dropmenu" href="#"> <i class="fa fa-star-o"></i> <span class="text">
        <?= lang('transfers'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
        <?php if(hasAccess(10,9)) { ?>
          <li id="transfers_index"> <a class="submenu" href="<?= site_url('transfers'); ?>"> <i class="fa fa-star-o"></i><span class="text">
            <?= lang('list_transfers'); ?>
            </span> </a> </li><?php }?>
             <?php if(hasAccess(10,6)) { ?>
          <li id="transfers_add"> <a class="submenu" href="<?= site_url('transfers/add'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_transfer'); ?>
            </span> </a> </li><?php }?>
             <?php if(hasAccess(10,23)) { ?>
          <li id="transfers_purchase_by_csv"> <a class="submenu" href="<?= site_url('transfers/transfer_by_csv'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_transfer_by_csv'); ?>
            </span> </a> </li><?php }?>
        </ul>
      </li>
      <?php }?>
      
       <?php if(hasAccess(17,0)) { ?>
      <li class="mm_auth mm_customers mm_suppliers mm_billers"> <a class="dropmenu" href="#"> <i class="fa fa-users"></i> <span class="text">
        <?= lang('people'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
        <?php if(hasAccess(16,0)) { ?>
           <li id="auth_user_groups"> <a href="<?= site_url('auth/user_groups') ?>"> <i class="fa fa-key"></i><span class="text">
            <?= lang('group_permissions'); ?>
            </span> </a> </li>
        <?php }?>
        
  <?php if(hasAccess(17,9)) { ?>
          <li id="auth_users"> <a class="submenu" href="<?= site_url('users'); ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('list_users'); ?>
            </span> </a> </li> <?php }?>
             <?php if(hasAccess(17,6)) { ?>
          <li id="auth_create_user"> <a class="submenu" href="<?= site_url('users/create_user'); ?>"> <i class="fa fa-user-plus"></i><span class="text">
            <?= lang('new_user'); ?>
            </span> </a> </li><?php }?>
            <?php if(hasAccess(18,0)) { ?>
            <?php if(hasAccess(18,9)) { ?>
          <li id="billers_index"> <a class="submenu" href="<?= site_url('billers'); ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('list_billers'); ?>
            </span> </a> </li><?php }?>
             <?php if(hasAccess(18,6)) { ?>
          <li id="billers_index"> <a class="submenu" href="<?= site_url('billers/add'); ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_biller'); ?>
            </span> </a> </li><?php }?>
            <?php }?>
            
             <?php if(hasAccess(11,0)) { ?>
               <?php if(hasAccess(11,9)) { ?>
          <li id="customers_index"> <a class="submenu" href="<?= site_url('customers'); ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('list_customers'); ?>
            </span> </a> </li><?php }?>
              <?php if(hasAccess(11,6)) { ?>
          <li id="customers_index"> <a class="submenu" href="<?= site_url('customers/add'); ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_customer'); ?>
            </span> </a> </li>
            <?php }?>
            <?php }?>
            
              <?php if(hasAccess(12,0)) { ?>  <?php if(hasAccess(12,9)) { ?>
          <li id="suppliers_index"> <a class="submenu" href="<?= site_url('suppliers'); ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('list_suppliers'); ?>
            </span> </a> </li> <?php }?>  <?php if(hasAccess(12,6)) { ?>
          <li id="suppliers_index"> <a class="submenu" href="<?= site_url('suppliers/add'); ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_supplier'); ?>
            </span> </a> </li>
             <?php }?> <?php }?>
        </ul>
      </li>
       <?php }?>
      
      <?php if(hasAccess(19,0) && hasAccess(19,9)) { ?>
      <li class="mm_notifications"> <a class="submenu" href="<?= site_url('notifications'); ?>"> <i class="fa fa-info-circle"></i><span class="text">
        <?= lang('notifications'); ?>
        </span> </a> </li>
 <?php }?>
 
      <li class="mm_system_settings <?= strtolower($this->router->fetch_method()) != 'settings' ? '' : 'mm_pos' ?>"> <a class="dropmenu" href="#"> <i class="fa fa-cog"></i><span class="text">
        <?= lang('settings'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="system_settings_index"> <a href="<?= site_url('system_settings') ?>"> <i class="fa fa-cog"></i><span class="text">
            <?= lang('system_settings'); ?>
            </span> </a> </li>
          <?php if (POS) { ?>
          <li id="pos_settings"> <a href="<?= site_url('pos/settings') ?>"> <i class="fa fa-th-large"></i><span class="text">
            <?= lang('pos_settings'); ?>
            </span> </a> </li>
          <?php } ?>
          <li id="system_settings_change_logo"> <a href="<?= site_url('system_settings/change_logo') ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-upload"></i><span class="text">
            <?= lang('change_logo'); ?>
            </span> </a> </li>
          <li id="system_settings_currencies"> <a href="<?= site_url('system_settings/currencies') ?>"> <i class="fa fa-money"></i><span class="text">
            <?= lang('currencies'); ?>
            </span> </a> </li>
          <li id="system_settings_customer_groups"> <a href="<?= site_url('system_settings/customer_groups') ?>"> <i class="fa fa-chain"></i><span class="text">
            <?= lang('customer_groups'); ?>
            </span> </a> </li>
          <li id="system_settings_price_groups"> <a href="<?= site_url('system_settings/price_groups') ?>"> <i class="fa fa-dollar"></i><span class="text">
            <?= lang('price_groups'); ?>
            </span> </a> </li>
          <li id="system_settings_categories"> <a href="<?= site_url('system_settings/categories') ?>"> <i class="fa fa-folder-open"></i><span class="text">
            <?= lang('categories'); ?>
            </span> </a> </li>
          <li id="system_settings_expense_categories"> <a href="<?= site_url('system_settings/expense_categories') ?>"> <i class="fa fa-folder-open"></i><span class="text">
            <?= lang('expense_categories'); ?>
            </span> </a> </li>
          <li id="system_settings_units"> <a href="<?= site_url('system_settings/units') ?>"> <i class="fa fa-wrench"></i><span class="text">
            <?= lang('units'); ?>
            </span> </a> </li>
            
            
                <li id="system_settings_brands"> <a href="<?= site_url('system_settings/modules') ?>"> <i class="fa fa-th-list"></i><span class="text">
            <?= lang('modules'); ?>
            </span> </a> </li>
            
              <li id="system_settings_brands"> <a href="<?= site_url('system_settings/rules') ?>"> <i class="fa fa-th-list"></i><span class="text">
            <?= lang('rules'); ?>
            </span> </a> </li>
            
            
          <li id="system_settings_brands"> <a href="<?= site_url('system_settings/brands') ?>"> <i class="fa fa-th-list"></i><span class="text">
            <?= lang('brands'); ?>
            </span> </a> </li>
          <li id="system_settings_variants"> <a href="<?= site_url('system_settings/variants') ?>"> <i class="fa fa-tags"></i><span class="text">
            <?= lang('variants'); ?>
            </span> </a> </li>
          <li id="system_settings_tax_rates"> <a href="<?= site_url('system_settings/tax_rates') ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('tax_rates'); ?>
            </span> </a> </li>
          <li id="system_settings_warehouses"> <a href="<?= site_url('system_settings/warehouses') ?>"> <i class="fa fa-building-o"></i><span class="text">
            <?= lang('warehouses'); ?>
            </span> </a> </li>
          <li id="system_settings_email_templates"> <a href="<?= site_url('system_settings/email_templates') ?>"> <i class="fa fa-envelope"></i><span class="text">
            <?= lang('email_templates'); ?>
            </span> </a> </li>
       
          <li id="system_settings_backups"> <a href="<?= site_url('system_settings/backups') ?>"> <i class="fa fa-database"></i><span class="text">
            <?= lang('backups'); ?>
            </span> </a> </li>
        <!--  <li id="system_settings_updates"> <a href="<? //= site_url('system_settings/updates') ?>"> <i class="fa fa-upload"></i><span class="text">
            <? //= lang('updates'); ?>
            </span> </a> </li>-->
        </ul>
      </li>

      <li class="mm_reports"> <a class="dropmenu" href="#"> <i class="fa fa-bar-chart-o"></i> <span class="text">
        <?= lang('reports'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="reports_index"> <a href="<?= site_url('reports') ?>"> <i class="fa fa-bars"></i><span class="text">
            <?= lang('overview_chart'); ?>
            </span> </a> </li>
          <li id="reports_warehouse_stock"> <a href="<?= site_url('reports/warehouse_stock') ?>"> <i class="fa fa-building"></i><span class="text">
            <?= lang('warehouse_stock'); ?>
            </span> </a> </li>
          <?php if (POS) { ?>
          <li id="reports_register"> <a href="<?= site_url('reports/register') ?>"> <i class="fa fa-th-large"></i><span class="text">
            <?= lang('register_report'); ?>
            </span> </a> </li>
          <?php } ?>
          <li id="reports_quantity_alerts"> <a href="<?= site_url('reports/quantity_alerts') ?>"> <i class="fa fa-bar-chart-o"></i><span class="text">
            <?= lang('product_quantity_alerts'); ?>
            </span> </a> </li>
          <?php if ($Settings->product_expiry) { ?>
          <li id="reports_expiry_alerts"> <a href="<?= site_url('reports/expiry_alerts') ?>"> <i class="fa fa-bar-chart-o"></i><span class="text">
            <?= lang('product_expiry_alerts'); ?>
            </span> </a> </li>
          <?php } ?>
          <li id="reports_products"> <a href="<?= site_url('reports/products') ?>"> <i class="fa fa-barcode"></i><span class="text">
            <?= lang('products_report'); ?>
            </span> </a> </li>
          <li id="reports_categories"> <a href="<?= site_url('reports/categories') ?>"> <i class="fa fa-folder-open"></i><span class="text">
            <?= lang('categories_report'); ?>
            </span> </a> </li>
          <li id="reports_brands"> <a href="<?= site_url('reports/brands') ?>"> <i class="fa fa-cubes"></i><span class="text">
            <?= lang('brands_report'); ?>
            </span> </a> </li>
          <li id="reports_daily_sales"> <a href="<?= site_url('reports/daily_sales') ?>"> <i class="fa fa-calendar"></i><span class="text">
            <?= lang('daily_sales'); ?>
            </span> </a> </li>
          <li id="reports_monthly_sales"> <a href="<?= site_url('reports/monthly_sales') ?>"> <i class="fa fa-calendar"></i><span class="text">
            <?= lang('monthly_sales'); ?>
            </span> </a> </li>
          <li id="reports_sales"> <a href="<?= site_url('reports/sales') ?>"> <i class="fa fa-heart"></i><span class="text">
            <?= lang('sales_report'); ?>
            </span> </a> </li>
          <li id="reports_payments"> <a href="<?= site_url('reports/payments') ?>"> <i class="fa fa-money"></i><span class="text">
            <?= lang('payments_report'); ?>
            </span> </a> </li>
          <li id="reports_profit_loss"> <a href="<?= site_url('reports/profit_loss') ?>"> <i class="fa fa-money"></i><span class="text">
            <?= lang('profit_and_loss'); ?>
            </span> </a> </li>
          <li id="reports_daily_purchases"> <a href="<?= site_url('reports/daily_purchases') ?>"> <i class="fa fa-calendar"></i><span class="text">
            <?= lang('daily_purchases'); ?>
            </span> </a> </li>
          <li id="reports_monthly_purchases"> <a href="<?= site_url('reports/monthly_purchases') ?>"> <i class="fa fa-calendar"></i><span class="text">
            <?= lang('monthly_purchases'); ?>
            </span> </a> </li>
          <li id="reports_purchases"> <a href="<?= site_url('reports/purchases') ?>"> <i class="fa fa-star"></i><span class="text">
            <?= lang('purchases_report'); ?>
            </span> </a> </li>
          <li id="reports_expenses"> <a href="<?= site_url('reports/expenses') ?>"> <i class="fa fa-star"></i><span class="text">
            <?= lang('expenses_report'); ?>
            </span> </a> </li>
          <li id="reports_customer_report"> <a href="<?= site_url('reports/customers') ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('customers_report'); ?>
            </span> </a> </li>
          <li id="reports_supplier_report"> <a href="<?= site_url('reports/suppliers') ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('suppliers_report'); ?>
            </span> </a> </li>
          <li id="reports_staff_report"> <a href="<?= site_url('reports/users') ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('staff_report'); ?>
            </span> </a> </li>
        </ul>
      </li>
      <?php
                         // not owner and not admin
                            ?>
      <?php if ($GP['products-index'] || $GP['products-add'] || $GP['products-barcode']) { ?>
      <li class="mm_products"> <a class="dropmenu" href="#"> <i class="fa fa-barcode"></i> <span class="text">
        <?= lang('products'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="products_index"> <a class="submenu" href="<?= site_url('products'); ?>"> <i class="fa fa-barcode"></i><span class="text">
            <?= lang('list_products'); ?>
            </span> </a> </li>
          <?php if ($GP['products-add']) { ?>
          <li id="products_add"> <a class="submenu" href="<?= site_url('products/add'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_product'); ?>
            </span> </a> </li>
          <?php } ?>
          <?php if ($GP['products-barcode']) { ?>
          <li id="products_sheet"> <a class="submenu" href="<?= site_url('products/print_barcodes'); ?>"> <i class="fa fa-tags"></i><span class="text">
            <?= lang('print_barcode_label'); ?>
            </span> </a> </li>
          <?php } ?>
          <?php if ($GP['products-edit']) { ?>
          <li id="products_quantity_adjustments"> <a class="submenu" href="<?= site_url('products/quantity_adjustments'); ?>"> <i class="fa fa-filter"></i><span class="text">
            <?= lang('quantity_adjustments'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if ($GP['sales-index'] || $GP['sales-add'] || $GP['sales-deliveries'] || $GP['sales-gift_cards']) { ?>
      <li class="mm_sales <?= strtolower($this->router->fetch_method()) == 'settings' ? '' : 'mm_pos' ?>"> <a class="dropmenu" href="#"> <i class="fa fa-heart"></i> <span class="text">
        <?= lang('sales'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="sales_index"> <a class="submenu" href="<?= site_url('sales'); ?>"> <i class="fa fa-heart"></i><span class="text">
            <?= lang('list_sales'); ?>
            </span> </a> </li>
          <?php if (POS && $GP['pos-index']) { ?>
          <li id="pos_sales"> <a class="submenu" href="<?= site_url('pos/sales'); ?>"> <i class="fa fa-heart"></i><span class="text">
            <?= lang('pos_sales'); ?>
            </span> </a> </li>
          <?php } ?>
          <?php if ($GP['sales-add']) { ?>
          <li id="sales_add"> <a class="submenu" href="<?= site_url('sales/add'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_sale'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['sales-deliveries']) { ?>
          <li id="sales_deliveries"> <a class="submenu" href="<?= site_url('sales/deliveries'); ?>"> <i class="fa fa-truck"></i><span class="text">
            <?= lang('deliveries'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['sales-gift_cards']) { ?>
          <li id="sales_gift_cards"> <a class="submenu" href="<?= site_url('sales/gift_cards'); ?>"> <i class="fa fa-gift"></i><span class="text">
            <?= lang('gift_cards'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if ($GP['quotes-index'] || $GP['quotes-add']) { ?>
      <li class="mm_quotes"> <a class="dropmenu" href="#"> <i class="fa fa-heart-o"></i> <span class="text">
        <?= lang('quotes'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="sales_index"> <a class="submenu" href="<?= site_url('quotes'); ?>"> <i class="fa fa-heart-o"></i><span class="text">
            <?= lang('list_quotes'); ?>
            </span> </a> </li>
          <?php if ($GP['quotes-add']) { ?>
          <li id="sales_add"> <a class="submenu" href="<?= site_url('quotes/add'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_quote'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if ($GP['purchases-index'] || $GP['purchases-add'] || $GP['purchases-expenses']) { ?>
      <li class="mm_purchases"> <a class="dropmenu" href="#"> <i class="fa fa-star"></i> <span class="text">
        <?= lang('purchases'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="purchases_index"> <a class="submenu" href="<?= site_url('purchases'); ?>"> <i class="fa fa-star"></i><span class="text">
            <?= lang('list_purchases'); ?>
            </span> </a> </li>
          <?php if ($GP['purchases-add']) { ?>
          <li id="purchases_add"> <a class="submenu" href="<?= site_url('purchases/add'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_purchase'); ?>
            </span> </a> </li>
          <?php } ?>
          <?php if ($GP['purchases-expenses']) { ?>
          <li id="purchases_expenses"> <a class="submenu" href="<?= site_url('purchases/expenses'); ?>"> <i class="fa fa-dollar"></i><span class="text">
            <?= lang('list_expenses'); ?>
            </span> </a> </li>
          <li id="purchases_add_expense"> <a class="submenu" href="<?= site_url('purchases/add_expense'); ?>" 
                                            data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_expense'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if ($GP['transfers-index'] || $GP['transfers-add']) { ?>
      <li class="mm_transfers"> <a class="dropmenu" href="#"> <i class="fa fa-star-o"></i> <span class="text">
        <?= lang('transfers'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <li id="transfers_index"> <a class="submenu" href="<?= site_url('transfers'); ?>"> <i class="fa fa-star-o"></i><span class="text">
            <?= lang('list_transfers'); ?>
            </span> </a> </li>
          <?php if ($GP['transfers-add']) { ?>
          <li id="transfers_add"> <a class="submenu" href="<?= site_url('transfers/add'); ?>"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_transfer'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if ($GP['customers-index'] || $GP['customers-add'] || $GP['suppliers-index'] || $GP['suppliers-add']) { ?>
      <li class="mm_auth mm_customers mm_suppliers mm_billers"> <a class="dropmenu" href="#"> <i class="fa fa-users"></i> <span class="text">
        <?= lang('people'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <?php if ($GP['customers-index']) { ?>
          <li id="customers_index"> <a class="submenu" href="<?= site_url('customers'); ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('list_customers'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['customers-add']) { ?>
          <li id="customers_index"> <a class="submenu" href="<?= site_url('customers/add'); ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_customer'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['suppliers-index']) { ?>
          <li id="suppliers_index"> <a class="submenu" href="<?= site_url('suppliers'); ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('list_suppliers'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['suppliers-add']) { ?>
          <li id="suppliers_index"> <a class="submenu" href="<?= site_url('suppliers/add'); ?>" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus-circle"></i><span class="text">
            <?= lang('add_supplier'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php if ($GP['reports-quantity_alerts'] || $GP['reports-expiry_alerts'] || $GP['reports-products'] || $GP['reports-monthly_sales'] || $GP['reports-sales'] || $GP['reports-payments'] || $GP['reports-purchases'] || $GP['reports-customers'] || $GP['reports-suppliers'] || $GP['reports-expenses']) { ?>
      <li class="mm_reports"> <a class="dropmenu" href="#"> <i class="fa fa-bar-chart-o"></i> <span class="text">
        <?= lang('reports'); ?>
        </span> <span class="chevron closed"></span> </a>
        <ul>
          <?php if ($GP['reports-quantity_alerts']) { ?>
          <li id="reports_quantity_alerts"> <a href="<?= site_url('reports/quantity_alerts') ?>"> <i class="fa fa-bar-chart-o"></i><span class="text">
            <?= lang('product_quantity_alerts'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-expiry_alerts']) { ?>
          <?php if ($Settings->product_expiry) { ?>
          <li id="reports_expiry_alerts"> <a href="<?= site_url('reports/expiry_alerts') ?>"> <i class="fa fa-bar-chart-o"></i><span class="text">
            <?= lang('product_expiry_alerts'); ?>
            </span> </a> </li>
          <?php } ?>
          <?php }
                                    if ($GP['reports-products']) { ?>
          <li id="reports_products"> <a href="<?= site_url('reports/products') ?>"> <i class="fa fa-barcode"></i><span class="text">
            <?= lang('products_report'); ?>
            </span> </a> </li>
          <li id="reports_categories"> <a href="<?= site_url('reports/categories') ?>"> <i class="fa fa-folder-open"></i><span class="text">
            <?= lang('categories_report'); ?>
            </span> </a> </li>
          <li id="reports_brands"> <a href="<?= site_url('reports/brands') ?>"> <i class="fa fa-cubes"></i><span class="text">
            <?= lang('brands_report'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-daily_sales']) { ?>
          <li id="reports_daily_sales"> <a href="<?= site_url('reports/daily_sales') ?>"> <i class="fa fa-calendar-o"></i><span class="text">
            <?= lang('daily_sales'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-monthly_sales']) { ?>
          <li id="reports_monthly_sales"> <a href="<?= site_url('reports/monthly_sales') ?>"> <i class="fa fa-calendar-o"></i><span class="text">
            <?= lang('monthly_sales'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-sales']) { ?>
          <li id="reports_sales"> <a href="<?= site_url('reports/sales') ?>"> <i class="fa fa-heart"></i><span class="text">
            <?= lang('sales_report'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-payments']) { ?>
          <li id="reports_payments"> <a href="<?= site_url('reports/payments') ?>"> <i class="fa fa-money"></i><span class="text">
            <?= lang('payments_report'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-daily_purchases']) { ?>
          <li id="reports_daily_purchases"> <a href="<?= site_url('reports/daily_purchases') ?>"> <i class="fa fa-calendar-o"></i><span class="text">
            <?= lang('daily_purchases'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-monthly_purchases']) { ?>
          <li id="reports_monthly_purchases"> <a href="<?= site_url('reports/monthly_purchases') ?>"> <i class="fa fa-calendar-o"></i><span class="text">
            <?= lang('monthly_purchases'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-purchases']) { ?>
          <li id="reports_purchases"> <a href="<?= site_url('reports/purchases') ?>"> <i class="fa fa-star"></i><span class="text">
            <?= lang('purchases_report'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-expenses']) { ?>
          <li id="reports_expenses"> <a href="<?= site_url('reports/expenses') ?>"> <i class="fa fa-star"></i><span class="text">
            <?= lang('expenses_report'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-customers']) { ?>
          <li id="reports_customer_report"> <a href="<?= site_url('reports/customers') ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('customers_report'); ?>
            </span> </a> </li>
          <?php }
                                    if ($GP['reports-suppliers']) { ?>
          <li id="reports_supplier_report"> <a href="<?= site_url('reports/suppliers') ?>"> <i class="fa fa-users"></i><span class="text">
            <?= lang('suppliers_report'); ?>
            </span> </a> </li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
      <?php  ?>
    </ul>
  </div>
  <a href="#" id="main-menu-act" class="full visible-md visible-lg"> <i class="fa fa-angle-double-left"></i> </a> </div>
