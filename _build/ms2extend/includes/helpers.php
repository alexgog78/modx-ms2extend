<?php

class Helpers
{
    public static function log($data, $level = 1)
    {
        global $modx;
        if ($data instanceof xPDOObject) {
            $data = $data->toArray('', false, true, true);
        }
        if (is_array($data)) {
            $data = print_r($data, true);
        }
        $modx->log($level, $data);
    }

    public static function resetTable(string $model)
    {
        global $modx;
        $sql = 'TRUNCATE ' . $modx->getTableName($model);
        $stmt = $modx->prepare($sql);
        if (!$stmt->execute()) {
            self::log($stmt->errorInfo());
            exit();
        }
    }
}
