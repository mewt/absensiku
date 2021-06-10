<?php
namespace app\models;

use kartik\export\ExportMenu;

/**
 * Created by PhpStorm.
 * User: andreyderma
 * Date: 27/10/18
 * Time: 13.39
 */

class CustomGridExportAttendance extends ExportMenu{

    function generateAfterContent($row)
    {
        $colFirst = self::columnName(7);
        $row++;
        $afterContentBeginRow = $row;
        $sheet = $this->_objWorksheet;
        foreach ($this->contentAfter as $contentAfter) {
            $this->setOutCellValue($sheet, $colFirst . $row, $contentAfter['value']);
            $opts = $this->getStyleOpts($contentAfter);
            $sheet->getStyle($colFirst . $row)->applyFromArray($opts);
            $row += 1;
        }

        $colFirst_ = self::columnName(1);
        $colEnd = self::columnName(6);
        for ($i = $afterContentBeginRow; $i < $row; $i++) {
            //echo $colFirst . $i;
            $sheet->mergeCells($colFirst . $i . ':' . self::columnName($this->_endCol) . $i);
            $sheet->mergeCells($colFirst_ . $i. ':'. $colEnd.$i);
            //$a += $i;
        }
    }
}