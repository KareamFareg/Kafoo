<table class="table table-striped- table-bordered table-hover table-checkable" id="main_div">
    <tbody>
        <tr>
            <td><?php echo e(__('order.user')); ?></td>
            <td>

                <ul>
                    <li>
                        <a href="<?php echo e(route("admin.clients.edit" , [ 'id' => $data->user_id ] )); ?>">
                            <?php echo e(optional($data->user_data)->name); ?>

                        </a>
                    </li>

                    <?php if(\App\Models\Rate::where(['user_id'=> $data->user_id ,'order_id'=>$data->id
                    ])->first()): ?>
                    <li>
                        <?php echo e(__('order.rate')); ?> :
                        <?php
                        $rate=\App\Models\Rate::where(['user_id'=> $data->user_id ,'order_id'=>$data->id
                        ])->first();

                        for ($x = 1; $x <= $rate->rate; $x++) { echo ' <i style="color: gold" class="fa fa-star"></i> '
                            ; }

                            ?>
                    </li>
                    <li> <?php echo e(__('order.order_comment')); ?> : <?php echo e($rate->comment); ?></li>
                    <?php endif; ?>

                </ul>


            </td>

        </tr>

        <?php if($data->shipper_data): ?>
        <tr>
            <td><?php echo e(__('order.shipper')); ?></td>
            <td>
                <ul>
                    <li> <a href="<?php echo e(route("admin.shippers.edit" , [ 'id' => optional($data->shipper_data)->id ] )); ?>">
                            <?php echo e(optional($data->shipper_data)->name); ?>

                        </a>
                    </li>
                    <?php if(\App\Models\Rate::where(['user_id'=> $data->shipper_id ,'order_id'=>$data->id
                    ])->first()): ?>
                    <li>
                        <?php echo e(__('order.rate')); ?> :
                        <?php
                        $rate=\App\Models\Rate::where(['user_id'=> $data->shipper_id ,'order_id'=>$data->id
                        ])->first();

                        for ($x = 1; $x <= $rate->rate; $x++) { echo ' <i style="color: gold" class="fa fa-star"></i> '
                            ; }

                            ?>
                    </li>
                    <li> <?php echo e(__('order.order_comment')); ?> : <?php echo e($rate->comment); ?></li>
                    <?php endif; ?>

                </ul>




            </td>
        </tr>
        <?php endif; ?>

    </tbody>
</table><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/orders/order_rate.blade.php ENDPATH**/ ?>