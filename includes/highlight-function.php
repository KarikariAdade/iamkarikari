<?php
function highlightWords($content, $search)
 {
    if(is_array($search)){
        foreach ( $search as $word )
        {
            $content = str_ireplace($word, '<span class="highlight_word">'.$word.'</span>', $content);
        }
    } else {
        $content = str_ireplace($search, '<span class="highlight_word">'.$search.'</span>', $content);        
    }
    return $content;
}
?>