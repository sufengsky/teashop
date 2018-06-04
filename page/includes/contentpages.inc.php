<?php
///////////////翻页类

class pages {

    /**
     * 页面输出结果
     *
     * @var string
     */
	var $output;

    /**
     * 使用该类的文件,默认为 PHP_SELF
     *
     * @var string
     */
	var $file;

    /**
     * 页数传递变量，默认为 'p'
     *
     * @var string
     */
	var $pvar = "p";

    /**
     * 页面大小
     *
     * @var integer
     */
	var $psize;

    /**
     * 当前页面
     *
     * @var ingeger
     */
	var $curr;

    /**
     * 要传递的变量数组
     *
     * @var array
     */

	var $varstr;

    /**
     * 总页数
     *
     * @var integer
     */
    var $tpage;

    /**
     * 分页设置
     *
     * @access public
     * @param int $pagesize 页面大小
     * @param int $total    总记录数
     * @param int $current  当前页数，默认会自动读取
     * @return void
     */
    function set($pagesize=20,$total,$parr,$current=false) {

		global $strPagesUp,$strPagesDown,$strPagesStart,$strPagesEnd,$strPagesDi,$strPagesYe;

		$this->total = $total;
		$this->tpage = ceil($total/$pagesize);
		

		if (!$current) {$current = $_GET[$this->pvar];}
		if ($current>$this->tpage) {$current = $this->tpage;}
		if ($current<1) {$current = 1;}

		$this->curr  = $current;
		$this->psize = $pagesize;

		if (!$this->file) {$this->file = $_SERVER["PHP_SELF"];}


		for($n=1;$n<=$this->tpage;$n++){
			if($current==$n){
				$optstr.='<option value="./?'.$parr[$n].'.html" selected>'.$strPagesDi.$n.$strPagesYe.'</option>';
			}else{
				$optstr.='<option value="./?'.$parr[$n].'.html">'.$strPagesDi.$n.$strPagesYe.'</option>';
			}
		}


		
		if ($this->tpage == 0) {
			$this->tpage=1;
		}
			if ($this->tpage > 0) {
            	
				$this->output.='<ul><li class="pbutton"><a href="./?'.$parr[1].'.html">'.$strPagesStart.'</a></li>';
			
				if ($current>1) {
				$this->output.='<li class="pbutton"><a href="./?'.$parr[$current-1].'.html" >'.$strPagesUp.'</a></li>';
				}else{
				$this->output.='<li class="pbuttonnow">'.$strPagesUp.'</li>';
			
				}


				if($this->tpage>10 && $current>6){
					if($current+4>$this->tpage){
						$start=$this->tpage-9;
					}else{
						$start=$current-5;
					}
					
				}else{
					$start=1;
				}

				
				if ($start<1){$start=1;}
				$end = $start+9;
				
				if ($end>$this->tpage)	{$end=$this->tpage;}



            for ($i=$start; $i<=$end; $i++) {
                if ($current==$i) {
                    $this->output.='<li class="pagesnow">'.$i.'</li>';    
                } else {
                    $this->output.='<li><a href="./?'.$parr[$i].'.html">'.$i.'</a></li>';    
                }
            }

            if ($current<$this->tpage) {
				$this->output.='<li class="pbutton"><a  href="./?'.$parr[$current+1].'.html" >'.$strPagesDown.'</a></li>';
			}else{
				$this->output.='<li class="pbuttonnow">'.$strPagesDown.'</li>';
			
			}
           
		$this->output.='<li class="opt"><select onChange="window.location=this.options[this.selectedIndex].value">'.$optstr.'</select></li>';
		$this->output.='<li class="pbutton"><a href="./?'.$parr[$this->tpage].'.html">'.$strPagesEnd.'</a></li>';

	    $this->output.="</ul>";
	    }
	}

    /**
     * 要传递的变量设置
     *
     * @access public
     * @param array $data   要传递的变量，用数组来表示，参见上面的例子
     * @return void
     */	
	function setvar($data) {
		foreach ($data as $k=>$v) {
			$this->varstr.='&amp;'.$k.'='.urlencode($v);
		}
	}

    /**
     * 分页结果输出
     *
     * @access public
     * @param bool $return 为真时返回一个字符串，否则直接输出，默认直接输出
     * @return string
     */
	function output($return = false) {
		if ($return) {
			return $this->output;
		} else {
			echo $this->output;
		}
	}

    /**
     * 生成Limit语句
     *
     * @access public
     * @return string
     */
    function limit() {
		return (($this->curr-1)*$this->psize).','.$this->psize;
	}
    function ShowNow() {

		$pagesinfo["total"]=$this->tpage;
		$pagesinfo["now"]=$this->curr;
		$pagesinfo["shownum"]=$this->psize;

		if($this->total>0){
			if($this->total<=($this->curr-1)*$this->psize+$this->psize){
				$pagesinfo["from"]=($this->curr-1)*$this->psize+1;
				$pagesinfo["to"]=$this->total;
			}else{
				$pagesinfo["from"]=($this->curr-1)*$this->psize+1;
				$pagesinfo["to"]=($this->curr-1)*$this->psize+$this->psize;
			}
		}else{
			$pagesinfo["from"]=1;
			$pagesinfo["to"]=1;
		}



		return $pagesinfo;

	}
} 
?>