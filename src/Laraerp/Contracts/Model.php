<?php namespace Laraerp\Contracts;


interface Model {

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Model
     */
    public function setId($id);

    /**
     * Get identification
     *
     * @return int
     */
    public function getId();
}