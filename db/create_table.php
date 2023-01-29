<?php
  function create_table($con, $table_name){
    // table check
    $flag = false; 
    $sql = "show tables from hotel";
    $result = mysqli_query($con, $sql) or  die("테이블 보여주기 실패". mysqli_error($con)); 
    while($row = mysqli_fetch_array($result)){
      if($row[0] == "$table_name"){
        $flag = true;
        break; 
      }
    }

    // 원하는 테이블 없다면
    if($flag == false){
      switch($table_name){
        // 회원테이블
        case 'members':
          $sql = "create table if not exists members (
            num int not null auto_increment,
            id char(15) not null,
            name char(10) not null,
            email char(80),
            phone char(80),
            pass varchar(255) not null,
            regist_day varchar(255),
            level char(15),
            point int,
            primary key(num)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        break; 
        // 게시판테이블
        case 'image_board':
          $sql = "CREATE TABLE `image_board` (
            `num` int NOT NULL AUTO_INCREMENT,
            `id` char(15) NOT NULL,
            `name` char(10) NOT NULL,
            `subject` char(200) NOT NULL,
            `content` text NOT NULL,
            `regist_day` char(20) NOT NULL,
            `hit` int NOT NULL, 
            `file_name` char(40) NOT NULL,
            `file_type` char(40) NOT NULL,
            `file_copied` char(40) NOT NULL,
            PRIMARY KEY (`num`),
            KEY `id` (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
          break; 
        // 쪽지테이블 
        case 'message':
            $sql = "create table if not exists message ( 
              num int not null auto_increment, 
              send_id char(20) not null, 
              rv_id char(20) not null,
              kind char(20) not null,
              subject char(200) not null, 
              content text not null,  
              regist_day char(20), 
              primary key(num)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break; 
        // 예약테이블
        case 'reservation':
          $sql = "create table if not exists reservation (
            num int not null auto_increment,
            id varchar(20) NOT NULL,
            name varchar(40) not null,
            check_in char(20) not null,
            check_out char(20) not null,
            person int not null,
            breakfast int not null,
            room_type varchar(20) not null,
            request text not null ,
            total_rate char(30) not null,
            reserve_day char(20) not null,
            PRIMARY KEY (num)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
          break; 

        default: 
          echo "<script>alert('해당테이블을 찾을수 없습니다.')</script>";
          break;
      }

      $result = mysqli_query($con, $sql) or  die("테이블 생성 실패". mysqli_error($con));   
      if($result == true){
        echo "<script> alert('{$table_name} 테이블이 생성되었습니다.') </script>";
      }else{
        echo "<script> alert('{$table_name} 테이블이 생성되지 않았습니다.') </script>";
      }
    }
 }
?>
