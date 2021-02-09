<?php
session_start();
                             
                                include_once "orders.php";
                                $order=new Orders();
                                $q= $order->Delete();
                               
                                header("Location:cart.php");
                            
                        ?>