<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <div id="sidebar-menu">

            <ul id="side-menu">
                <?php
                $query="SELECT *from roles where status=1;";
                $roles = $conn->query($query);
                if ($roles->num_rows > 0)
                {
                    while($role = $roles->fetch_object())
                    {
                        ?>
                        <li>
                            <a href="#<?php echo $role->name; ?>Dashboard" data-bs-toggle="collapse">
                                <i data-feather="<?php echo $role->icon; ?>"></i>
                                <span> <?php echo $role->name; ?> </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="<?php echo $role->name; ?>Dashboard">
                                <ul class="nav-second-level">

                                    <?php
                                    $query="SELECT *from role_menu where role_id=$role->id order by position;";
                                    $role_menus = $conn->query($query);
                                    if ($role_menus->num_rows > 0)
                                    {

                                        while($role_menu = $role_menus->fetch_object())
                                        {

                                            echo "<li><a href='".$role_menu->url."'>$role_menu->name</a></li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                }
                ?>
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i data-feather="shopping-cart"></i>
                        <span> Ecommerce </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ecommerce-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="ecommerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="ecommerce-product-detail.html">Product Detail</a>
                            </li>
                            <li>
                                <a href="ecommerce-product-edit.html">Add Product</a>
                            </li>
                            <li>
                                <a href="ecommerce-customers.html">Customers</a>
                            </li>
                            <li>
                                <a href="ecommerce-orders.html">Orders</a>
                            </li>
                            <li>
                                <a href="ecommerce-order-detail.html">Order Detail</a>
                            </li>
                            <li>
                                <a href="ecommerce-sellers.html">Sellers</a>
                            </li>
                            <li>
                                <a href="ecommerce-cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="ecommerce-checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>