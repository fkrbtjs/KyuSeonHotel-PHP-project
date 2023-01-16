<?php
//$write_pages : 총 보여주는 페이지수(10페이지씩)
//$current_page : 현재페이지
//$total_page : 전체페이지
//$url : 'message_box.php?mode=$mode&page=7' 
function get_paging($write_pages, $current_page, $total_page, $url) { 

  // URL 변형
  // 예) 'message_box.php?mode=$mode&page=123' → 'message_box.php?mode=$mode'
  $url = preg_replace('/&page=[0-9]*/', '', $url) . '&amp;page=';

  // 0. 페이징 시작
  $str = '';

  // 1. 2페이지부터 '처음(<<)' 가기 표시
  ($current_page > 1) ? ($str .= '<a href="' . $url . '1" >◀◀</a>' . PHP_EOL) : ''; // 'PHP_EOL' = \n

  // 2. 시작 페이지와 끝 페이지를 정한다.(= 정하기만 한다.)
  $start_page = (((int)(($current_page - 1) / $write_pages)) * $write_pages) + 1;
  $end_page = $start_page + $write_pages - 1;
  if ($end_page >= $total_page) $end_page = $total_page;

  // 3. 11페이지부터 '이전(<)' 가기 표시
  if ($start_page > 1) $str .= '<a href="' . $url . ($start_page - 1) . '">◀</a>' . PHP_EOL;

  // 4. (총 페이지가 2페이지 이상일 경우부터) 시작 페이지와 끝 페이지를 등록한다.(= 페이지를 만드는 구문에 직접 추가한다.)
  if ($total_page > 1) {
      for ($k = $start_page; $k <= $end_page; $k++) {
          if ($current_page != $k)
              $str .= '<a href="' . $url . $k . '" class="">' . $k . '</a>' . PHP_EOL;
          else
              $str .= '<span style="font-weight:bold">' . $k . '</span>' . PHP_EOL;
      }
  }

  // 5. 총 페이지가 마지막 페이지보다 클 경우, '다음(>)' 가기 표시
  // 예) 20페이지에서 다음을 누르면 21페이지로 이동
  if ($total_page > $end_page) $str .= '<a href="' . $url . ($end_page + 1) . '">▶</a>' . PHP_EOL;

  // 6. 현재 페이지가 총 페이지보다 작을 경우, '마지막(>>)' 가기 표시
  if ($current_page < $total_page) {
      $str .= '<a href="' . $url . $total_page . '">▶▶</a>' . PHP_EOL;
  }

  // 7. 페이지 등록
  if ($str)
      return "<li><span>{$str}</span></li>";
  else
      return "";
}

function get_paging2($mode, $page, $total_page, $url){
  // 전체페이지가 2페이지이상이고, 현재 페이지가 2페이지 이상이면 이전페이지를 작동한다
	if ($total_page>=2 && $page >= 2){
		$new_page = $page-1;
		echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>◀ 이전</a> </li>";
	}	else{
		echo "<li>&nbsp;</li>";
  } 

   	// 게시판 목록 하단에 페이지 링크 번호 출력 (1페이지부터 마지막페이지 출력)
    // 현재 페이지 번호 링크 안함, 다른 페이지는 링크처리 
   	for ($i=1; $i<=$total_page; $i++){
       if ($page == $i){     
        echo "<li><b> $i </b></li>";
      }
      else{
        echo "<li> <a href='message_box.php?mode=$mode&page=$i'> $i </a> <li>";
      }
   	}
     // 전체페이지가 2페이지이상이고, 현재 페이지가 마지막페이지가 아니면 다음페이지를 작동한다
   	if ($total_page>=2 && $page != $total_page){
		$new_page = $page+1;	
		echo "<li> <a href='message_box.php?mode=$mode&page=$new_page'>다음 ▶</a> </li>";
    }else{ 
      echo "<li>&nbsp;</li>";
    }
}
?>