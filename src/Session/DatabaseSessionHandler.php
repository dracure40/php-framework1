<?php

namespace Framework1\Session;

use Framework1\Database\Adaptor;

class DatabaseSessionHandler implements \SessionHandlerInterface
{
    public function open($savePath, $sessionName)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($id)
    {
        $data = current(Adaptor::getAll('SELECT * FROM sessions WHERE `id` = ?', [$id]));

        if ( $data ) {
            $payload = $data->payload;
        } else {
            Adaptor::exec('INSERT INTO sessions (`id`) VALUES (?)', [$id]);
        }
        return $payload ?? '';
    }

    public function write($id, $payload)
    {
        return Adaptor::exec('UPDATE sessions SET `payload` = ? WHERE `id` = ?', [$payload, $id]);
    }

    public function destroy($id)
    {
        return Adaptor::exec('DELETE FROM sessions WHERE `id` = ?', [$id]);
    }

    public function gc($maxlifetime)
    {
        $sessions = Adaptor::getAll('SELECT * FROM sessions WHERE created_at < DATE_SUB(NOW(), INTERVAL :maxlifetime SECOND)');
        if ( $sessions ) {
            foreach ( $sessions as $session ) {
                $this->destroy($session->id);
            }
            return true;
        }
        return false;
    }
}
