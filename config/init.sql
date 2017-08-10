



-- 　Menuの詳細

CREATE TABLE Menus(
 menu_id int NOT NULL AUTO_INCREMENT primary key,
 menu_name VARCHAR(255),
 menu_image VARCHAR(255),
 category_name VARCHAR(255),
 detail_category_name VARCHAR(255),
 calorie int,
 protein int,
 fat int,
 carb int,
 menu_costs int,
 created_at timestamp not null default current_timestamp,
 updated_at timestamp not null default current_timestamp on update current_timestamp
);


-- new  Menus table  まだ実装していません


CREATE TABLE Menus(
 menu_id int NOT NULL AUTO_INCREMENT primary key,
 menu_name VARCHAR(255),
 menu_image VARCHAR(255),
 category_id int,
 detail_category_id int,
 created_at timestamp not null default current_timestamp,
 updated_at timestamp not null default current_timestamp on update current_timestamp
);



-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('コブサラダ','IMG_3374.jpg','主食・おかず','サラダ','191','46','128','18','100');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('プリン','IMG_3104.jpg','スイーツ','プリン','126','21','45','45','35');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('鶏肉のステーキ〜ブランデーソース〜','IMG_3802.jpg','主食・おかず','肉料理','366','123','137','1','150');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('揚げ出し豆腐','IMG_3720.jpg','主食・おかず','豆腐料理','176','28','87','54','141');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('バリバリ面〜バンバンジーサラダ風〜','IMG_3709.jpg','主食・おかず','野菜料理','150','50','60','40','170');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('バックリブステーキ〜バルサミコソース〜','IMG_3482.jpg','主食・おかず','肉料理','447','120','326','2','300');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('カリカリ梅のパラパラチャーハン','IMG_3706.jpg','主食・おかず','ご飯もの','673','62','189','400','100');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('ボロネーゼ','IMG_3679.jpg','主食・おかず','パスタ・グラタン','614','87','148','353','220');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('バンバンジー〜オリジナル胡麻味噌〜','IMG_3584.jpg','主食・おかず','肉料理','359','92','230','8','180');
-- insert into Menus (menu_name,menu_image,category_name,detail_category_name,calorie,protein,carb,fat,menu_costs) values ('酢豚','IMG_3736.jpg','主食・おかず','肉料理','359','92','230','8','180');



--　new   各食材の栄養素一覧　まだ実装していない

CREATE TABLE Food(
  food_id int auto_increment primary key,
  calorie int,
  protein int,
  fat int,
  carb int
)


-- 冷蔵庫の登録、材料一覧
CREATE TABLE boxFoods(
  id int auto_increment primary key,
  food_name varchar(255) not null unique,
  unit varchar(255),
  memo varchar(255)
)

-- 冷蔵庫に登録
CREATE TABLE myBox(
  id int auto_increment primary key,
  box_email varchar(255) not null,
  food_name varchar(255) not null,
  quantity int not null,
  unit varchar(30) not null,
  open_date date not null
)



insert into boxFoods (food_name,unit) values ('玉ねぎ','g');
insert into boxFoods (food_name,unit) values ('人参','g');
insert into boxFoods (food_name,unit) values ('キャベツ','g');
insert into boxFoods (food_name,unit) values ('じゃがいも','g');
insert into boxFoods (food_name,unit) values ('長ネギ','g');
insert into boxFoods (food_name,unit) values ('ピーマン','g');
insert into boxFoods (food_name,unit) values ('もやし','g');
insert into boxFoods (food_name,unit) values ('白菜','g');
insert into boxFoods (food_name,unit) values ('にら','g');






-- 各料理の手順
CREATE TABLE Procedures(
	menu_name varchar(255),
	procedure_number int,
	procedure_image VARCHAR(255),
	procedure_text VARCHAR(255)
)

-- new Procesures table 実装していない

CREATE TABLE Procedures(
  menu_id varchar(255),
  procedure_number int,
  procedure_image VARCHAR(255),
  procedure_text VARCHAR(255)
)

-- procedureは予約語




-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('1','1','IMG_3514.PNG','切る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('1','2','IMG_3514.PNG','煮る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('1','3','IMG_3514.PNG','洗う');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('1','4','IMG_3514.PNG','冷ます');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('1','5','IMG_3514.PNG','切る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('1','6','IMG_3514.PNG','食べる');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('2','1','IMG_3514.PNG','切る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('2','2','IMG_3514.PNG','煮る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('2','3','IMG_3514.PNG','洗う');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('2','4','IMG_3514.PNG','冷ます');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('2','5','IMG_3514.PNG','切る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('2','6','IMG_3514.PNG','食べる');

-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('3','1','IMG_3514.PNG','切る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('3','2','IMG_3514.PNG','煮る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('3','3','IMG_3514.PNG','洗う');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('3','4','IMG_3514.PNG','冷ます');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('3','5','IMG_3514.PNG','切る');
-- insert into Procedures (menu_id,procedure_number,procedure_image,procedure_text) values ('3','6','IMG_3514.PNG','食べる');

-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('揚げ出し豆腐','1','IMG_3712.jpg','豆腐を８当分に切る。分厚いと火が通りにくいため長方形になるようにする。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('揚げ出し豆腐','2','IMG_3713.jpg','ナスを4等分に切る。上３分の１を残し、切れ目を入れる。そうすることで上げた時に花のように広がる。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('揚げ出し豆腐','3','IMG_3714.jpg','スナップエンドウの筋を取り除き、軽くすすぐ。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('揚げ出し豆腐','4','IMG_3717.jpg','お湯を沸かし、片栗粉以外の調味料を入れる。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('揚げ出し豆腐','5','IMG_3718.jpg','片栗粉1:水:1になるように溶き、先ほど作っただし汁に、ダマにならないようかき混ぜながら少しずつ注いで、とろみをつける。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('揚げ出し豆腐','6','IMG_3720.jpg','各材料に片栗粉をつけ、揚げる。揚げた材料をならべ、だし汁を注いだら完成。');

-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('酢豚','1','IMG_3728.jpg','ピーマンを一口サイズに切る。軽く素揚げする。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('酢豚','2','IMG_3729.jpg','人参を一口サイズに切る。軽く素揚げする。人参は火が通りにくいので長めに揚げる。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('酢豚','3','IMG_3730.jpg','玉ねぎを一口サイズに切る。軽く素揚げする。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('酢豚','4','IMG_3732.jpg','豚バラ肉を一口サイズに切る。塩胡椒をし、放置した後、片栗粉をつけ揚げる。');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('酢豚','5','IMG_3735.jpg','調味料を加え、タレを作る');
-- insert into Procedures (menu_name,procedure_number,procedure_image,procedure_text) values ('酢豚','6','IMG_3736.jpg','揚げた食材を強にで一気に煽り、タレを加えとろみがついたら、弱火で片栗粉がしっかり開かせる。完成。');

-- -- 各料理の材料

CREATE TABLE Ingredients(
 menu_name varchar(255),
 ingredient_number int,
 ingredient_name VARCHAR(255),
 quantity int,
 unit VARCHAR(255),
 ingredient_costs int
)


-- new Ingredients table 実装していない
CREATE TABLE Ingredients(
 menu_id varchar(255),
 ingredient_number int,
 ingredient_id VARCHAR(255),
 quantity int,
 unit VARCHAR(255),
)

-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','1','玉ねぎ','10','g','10');
-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','2','ピーマン','15','g','10');
-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','3','ベーコン','30','g','50');
-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','4','パスタ','100','g','10');
-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','5','パセリ','','少々','10');
-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','6','ケチャップ','','10g','10');
-- insert into Ingredients (id,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('2','7','塩胡椒','','適量','5');

-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','1','レタス','80','g','10');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','2','グリーンカール','20','g','10');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','3','サニーレタス','20','g','10');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','4','コブドレッシング','15','cc','10');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','5','ベーコン','10','g','30');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','6','トマト','40','g','30');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('コブサラダ','7','パルメザンチーズ','20','g','5');

-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','1','パスタ','150','g','30');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','2','ひき肉','50','g','50');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','3','オリジナルトマトソース','100','g','30');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','4','塩胡椒','','適量','3');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','5','バジル','','適量','10');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','6','パルメザンチーズ','20','g','30');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','7','オリーブオイル','30','cc','10');
-- insert into Ingredients (menu_name,ingredient_number,ingredient_name,quantity,unit,ingredient_costs) values ('ボロネーゼ','8','白ワイン','30','cc','30');





-- カテゴリー
CREATE TABLE Menu_Category(
 category_id int NOT NULL AUTO_INCREMENT primary key,
 category_name VARCHAR(255)
);

-- insert into Menu_Category (category_id) values ('主食・おかず');
-- insert into Menu_Category (category_name) values ('スイーツ');
-- insert into Menu_Category (category_name) values ('パン・ピザ');
-- insert into Menu_Category (category_name) values ('その他');


CREATE TABLE Menu_Detail_Category(
 category_id int,
 detail_category_id int,
 detail_category_name VARCHAR(255)
);

-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','1','野菜料理');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','2','肉料理');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','3','魚介料理');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','4','ご飯もの');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','5','パスタ・グラタン');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','6','うどん・そば');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','7','スープ・汁物');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','8','サラダ');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','9','鍋料理');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','10','豆腐');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('1','11','粉もの');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('2','1','ケーキ');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('2','2','パイ');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('2','3','チョコレート');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('2','4','プリン');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('2','5','その他スイーツ');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('3','1','ハードブレッド');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('3','2','テーブルブレッド');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('3','3','菓子パン');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('3','4','ピザ');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('3','5','サンドイッチ');
-- insert into Menu_Detail_Category (category_id,detail_category_id,detail_category_name) values ('4','1','ドリンク');
-- UPDATE Menu_Detail_Category SET detail_category_name = '豆腐料理' WHERE detail_category_id = 10;




-- User情報
-- CREATE TABLE Users(
--  userId int(12) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'プライマリーキー',
--  password char(255) NOT NULL DEFAULT '' COMMENT 'パスワード',
--  email VARCHAR(128) NOT NULL DEFAULT '' unique COMMENT 'メールアドレス',
--  birthday date NOT NULL COMMENT '誕生日',
--  address int(7) NOT NULL COMMENT '郵便番号',
--  created_at timestamp,
--  updated_at timestamp
-- )



create table Users (
  id int not null auto_increment primary key,
  sexid int not null,
  birth date not null,
  address int not null,
  email varchar(255) not null unique,
  password varchar(255) not null,
  created datetime,
  modified datetime
);






-- CREATE TABLE Users(
--  userid int(12) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'プライマリーキー',
--  password char(255) NOT NULL DEFAULT '' COMMENT 'パスワード',
--  email VARCHAR(128) NOT NULL DEFAULT '' unique COMMENT 'メールアドレス',
--  birthday date NOT NULL COMMENT '誕生日',
--  address int(7) NOT NULL COMMENT '郵便番号',
--  token char(60) NOT NULL DEFAULT '' COMMENT 'トークン',
--  loginFailureCount TINYINT(1) NOT NULL DEFAULT '0' COMMENT 'ログイン失敗回数',
--  loginFailureDatetime DATETIME DEFAULT NULL COMMENT 'ログイン失敗日時',
--  deleteFlag TINYINT(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ' 
--  ) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ;

 

create table Favos (
  id int not null auto_increment primary key,
  email varchar(255),
  favo_menu_name varchar(255),
  created_at timestamp not null default current_timestamp
);



create table Program (
  id int not null auto_increment primary key,
  email varchar(255),
  program_menu_name varchar(255),
  program_number int,
  created_at timestamp not null default current_timestamp
);














