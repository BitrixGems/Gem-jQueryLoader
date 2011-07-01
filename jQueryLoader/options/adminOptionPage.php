<form method="post" action="">
	<?=bitrix_sessid_post()?>

	<style type="text/css">
		TD.list-table TABLE.list-table TR TD INPUT {
			width:100%;
		}
	</style>
	<table class="list-table">
		<tr>
			<td>Область применения</td>
			<td>
				<select name="jQueryLoader[sWhere]">
					<option value="ADMIN"<?if( $aOptions['sWhere'] == 'ADMIN' ):?> selected="selected"<?endif?>>Административная часть сайта</option>
					<option value="PUBLIC"<?if( $aOptions['sWhere'] == 'PUBLIC' ):?> selected="selected"<?endif?>>Публичная часть сайта</option>
					<option value="BOTH"<?if( $aOptions['sWhere'] == 'BOTH' ):?> selected="selected"<?endif?>>Везде</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Версия jQuery</td>
			<td><input type="text" name="jQueryLoader[sVersion]" value="<?=htmlspecialchars( @$aOptions['sVersion'] )?>"/></td>
		</tr>
	</table>
	<br />
	<input type="submit" value="Сохранить" />
</form>