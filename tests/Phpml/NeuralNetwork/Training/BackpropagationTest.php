<?php

declare (strict_types = 1);

namespace tests\Phpml\NeuralNetwork\Training;

use Phpml\NeuralNetwork\Network\MultilayerPerceptron;
use Phpml\NeuralNetwork\Training\Backpropagation;

class BackpropagationTest extends \PHPUnit_Framework_TestCase
{
    public function testBackpropagationForXORLearning()
    {
        $network = new MultilayerPerceptron([2, 2, 1]);
        $training = new Backpropagation($network);

        $training->train(
            [[1, 0], [0, 1], [1, 1], [0, 0]],
            [[1], [1], [0], [0]],
            $desiredError = 0.2,
            30000
        );

        $this->assertEquals(0, $network->setInput([1, 1])->getOutput()[0], '', $desiredError);
        $this->assertEquals(0, $network->setInput([0, 0])->getOutput()[0], '', $desiredError);
        $this->assertEquals(1, $network->setInput([1, 0])->getOutput()[0], '', $desiredError);
        $this->assertEquals(1, $network->setInput([0, 1])->getOutput()[0], '', $desiredError);
    }
}
