<?php

require_once "phing/tasks/system/ExecTask.php";

// see http://www.phing.info/docs/guide/stable/chapters/ExtendingPhing.html#WritingTasks

class Li3Task extends ExecTask {

/*
	<property name="li3.dir" value="app" />
	<property name="li3.php" value="../libraries/lithium/console/lithium.php" />


<target name="-unit-test-core">
	<phingcall target="li3-tests-cases">
		<property name="li3.test.root" value="${name}" />
	</phingcall>	
</target>

	
<target name="li3-tests-cases">
	<if><isset property="test-verbose" />
		<then>
			<phingcall target="li3">
				<property name="li3.command" value="test --verbose ${li3.test.root}/tests/cases" />
			</phingcall>
		</then>
		<else>
			<phingcall target="li3">
				<property name="li3.command" value="test ${li3.test.root}/tests/cases" />
			</phingcall>
		</else>
	</if>
	<fail if="li3.result"/>	
</target>

<exec command="php ${li3.php} ${li3.command}" dir="${li3.dir}" 
			outputProperty="li3.log" returnProperty="li3.result" checkreturn="false" />
*/
			
	protected $php;
	protected $li3php;
		
	public function setPhp($value) {
		$this->php = $value;
	}
	
	public function setLi3path($value) {
		$this->li3path = $value;
	}
	
	public function setLi3php($value) {
		$this->li3php = $value;
	}
						
    public function init() {
		// no parent
		$this->php = 'php';
		$this->li3php = 'lithium/console/lithium.php';		
	}

    public function main() {
		$this->prepareLi3Exec();
		parent::main();
    }
	
	protected function prepareLi3Exec()
	{
		$command = array($this->php, $this->li3php, $this->command);
		$this->command = implode(' ', $command);
	}
}

?>