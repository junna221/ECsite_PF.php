<table>
		<?php $total=0;?>
		<?php foreach ($sql_detail as $row_detail):?>
			<tr>
			<td><img src="image/<?php echo $row_detail['id'] ?>.jpg " height="70" width="100">
				<?php echo $row_detail['name']?></td>
			<td><?php echo $row_detail['price']?></td>
			<td><?php echo $row_detail['count']?></td>
			<?php $subtotal=$row_detail['price']*$row_detail['count'];?>
			<?php $total+=$subtotal;?>
			<td><?php echo $subtotal ?></td>
			</tr>
		<?php endforeach; ?>
		<tr><td>合計</td><td></td><td></td><td></td><td>
			<?php echo $total ?> </td></tr>
		</table>
		<hr>
	<?php endforeach; ?>
<?php else: ?>
	購入履歴を表示するには、ログインしてください。
<?php endif; ?>

<?php include('head_foot/header.php');?>