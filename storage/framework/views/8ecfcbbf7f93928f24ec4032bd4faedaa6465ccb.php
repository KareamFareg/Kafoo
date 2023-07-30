<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo e($data->code); ?></title>

  <style>
    .invoice-box {
      /*      max-width: 800px;
     margin: auto;
       padding: 30px;
      border: 1px solid #eee;
    box-shadow:  5px rgba(0, 0, 0, .15); */
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: right;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media  only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
      text-align: right;
      direction: rtl;
    }

    .rtl table tr td:nth-child(2) {
      text-align: right;
      direction: rtl;
    }
  </style>
</head>

<body class="rtl" style="font-family: XB Riyaz ; ">
  <div class="invoice-box">
    <table class="rtl" cellpadding="0" cellspacing="0">
      <tr class="top">
        <td colspan="2">
          <table>
            <tr>
              <td class="title">
                <img src="<?php echo e($settings['logo']); ?>" style="width:100%; max-width:300px;">
              </td>

              <td>
                <ul>
                  <li><?php echo e(__('order.order_id')); ?>&nbsp;:&nbsp;<?php echo e($data->code); ?> </li>
                  <li><?php echo e(__('words.date')); ?>&nbsp;:&nbsp;<?php echo e($data->created_at); ?> </li>
                  <?php if($data->status != 1): ?> <li>
                    <?php echo e(__('order.accept_date')); ?>&nbsp;:&nbsp;<?php echo e($data->accept_date); ?> </li> <?php endif; ?>
                  <li><?php echo e(__('words.order_status')); ?>&nbsp;:&nbsp;<?php echo e($data->orderStatus()); ?>

                    <?php if($data->status == 4): ?> <?php echo e($data->delivery_date); ?> <?php endif; ?>
                    <?php if($data->status == 5): ?> <?php echo e($data->cancel_date); ?> <?php endif; ?>
                  </li>
                  <li><?php echo e(__('words.type')); ?>&nbsp;:&nbsp;<?php echo e($data->type_title()); ?></li>
                  <li><?php echo e(__('order.paytype')); ?>&nbsp;:&nbsp;<?php echo e($data->orderPayment()); ?></li>

                </ul>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="2">
          <table class="rtl">

            <tr>
              <td>
                <strong><?php echo e(__('order.user')); ?></strong><br>
                <?php echo e(optional($data->user_data)->name ?? __('words.deleted')); ?><br>
                <?php echo e(optional($data->user_data)->phone); ?><br>
                <?php echo e(optional($data->user_data)->email); ?><br>
              </td>
              <td>
                <strong><?php echo e(__('order.shipper')); ?></strong><br>
                <?php echo e(optional($data->shipper_data)->name ?? __('words.deleted')); ?><br>
                <?php echo e(optional($data->shipper_data)->phone); ?><br>
                <?php echo e(optional($data->shipper_data)->email); ?><br>

              </td>
            </tr>

          </table>

        </td>
      </tr>



      <tr class="heading">
        <td>
          <?php echo e(__('words.name')); ?>

        </td>

        <td>
          <?php echo e(__('words.quantity')); ?>

        </td>
      </tr>


      <?php $__currentLoopData = $data->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr class="item">
        <td><?php echo e($item->title); ?></td>

        <td><?php echo e($item-> quantity); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>




      <tr class="total">
        <td></td>
        <td>
          <?php echo e(__('order.total_first')); ?> : <?php echo e($data->price); ?>

        </td>
      </tr>
      <tr class="total">
        <td></td>
        <td>
          <?php echo e(__('order.shipping')); ?> : <?php echo e(optional($data->offer)->shipping); ?>

        </td>
      </tr>
      <tr class="total">
        <td></td>
        <td>
          <?php echo e(__('commission.commissions ')); ?> : <?php echo e($data->commission); ?>

        </td>
      </tr>
      <tr class="total">
        <td></td>
        <td>
          <?php echo e(__('order.discount')); ?> : <?php echo e(floatval($data->discount)); ?>

        </td>
      </tr>
      <tr class="total">
        <td></td>
        <td>
          <?php echo e(__('order.total')); ?> : <?php echo e($data->price + optional($data->offer)->shipping - floatval($data->discount)+floatval($data->commission)); ?>

        </td>
      </tr>

      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>

      <tr class="details">
        <td><strong><?php echo e(__('order.comment')); ?></strong> </td>
        <td><?php echo e($data->comment); ?></td>
      </tr>
      <tr class="details">
        <td><strong><?php echo e(__('order.note')); ?></strong></td>
        <td><?php echo e($data->note); ?> </td>
      </tr>

    </table>
  </div>


</body>

</html><?php /**PATH /home/kafoosaappsjanna/lara/resources/views/admin/orders/invoice.blade.php ENDPATH**/ ?>