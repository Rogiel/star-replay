<?php
/**
 * Copyright (c) 2016, Rogiel Sulzbach
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 * this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation
 * and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF
 * THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Rogiel\StarReplay\Hydrator;

use GeneratedHydrator\Configuration;

class GeneratedHydratorFactory implements HydratorFactory {

	/**
	 * @var null
	 */
	private $directory = null;
	private $hydrators = array();

	/**
	 * GeneratedHydratorFactory constructor.
	 * @param null $directory
	 */
	public function __construct($directory = null) {
		$this->directory = $directory;
	}

	public function getHydrator($class) {
		if(isset($this->hydrators[$class])) {
			return $this->hydrators[$class];
		}

		$configuration = new Configuration($class);
		$configuration->setGeneratedClassesNamespace('Rogiel\StarReplay\Hydrator\Generated');
		if($this->directory !== null) {
			$configuration->setGeneratedClassesTargetDir($this->directory);
			spl_autoload_register($configuration->getGeneratedClassAutoloader());
		}

		$hydratorClass = $configuration->createFactory()->getHydratorClass();
		$this->hydrators[$class] = new $hydratorClass();
		return $this->hydrators[$class];
	}

}