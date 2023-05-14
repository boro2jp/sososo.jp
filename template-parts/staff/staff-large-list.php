<?php
$query = array(
	'orderby'=> 'ID',
	'order'=> 'ASC',
	'search'       => '', //検索キーワード
	'fields'       => 'all', //配列に含めるフィールド
	'who'          => '' //指定したユーザー権限よりも上位の権限を抽出
);
$users = get_users($query);
?>
<?php if(!empty($users)): ?>
    <ul class="staff-list">
		<?php foreach($users as $user) {
			$uid = $user->ID; ?>
			<?php get_template_part( 'template-parts/staff/staff-large-list-item', null, ['staff' => $user, 'btn' => true]); ?>
		<?php } ?>
    </ul>
<?php else :
        get_template_part( 'template-parts/empty' ,null, ['title' =>"スタッフがいません", "body" => "申し訳ありません。ただいま準備中でございます。"]);
    endif;
?>
