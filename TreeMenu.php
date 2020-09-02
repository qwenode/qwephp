<?php


namespace qwenode\qwephp;


class TreeMenu
{
    /**
     * Convert one-dimensional array to multi-dimensional menu tree
     * @param array $data [['id'=>1,'name'=>'xxx','pid'=>0]]
     * @return array
     */
    public static function toTree(array $data): array
    {
        $result = [];
        foreach ($data as $datum) {
            $result[$datum['id']] = $datum;
            if (!isset($datum['_child'])) {
                $result[$datum['id']]['_child'] = [];
            }
        }
        foreach ($result as $item) {
            $result[$item['pid']]['_child'][$item['id']] = &$result[$item['id']];
        }
        $result = isset($result[0]['_child']) ? $result[0]['_child'] : [];
        return $result;
    }

    /**
     * convert multi-dimensional tree to breadcrumb path
     * @param array $data example: [['id'=>1,'name'=>'xxx','pid'=>0,'_child'=>['id'=>2,'name'=>'bbb','pid'=>1,'_child'=>['id'=>3,'name'=>'ccc','pid'=>2]]]]
     * @param array $tree result ['xxx > bbb'=>'xxx > bbb']
     * @param string $separator home > page or home / page
     * @return array
     */
    public static function toBreadcrumb(array $data, array &$tree = [], string $separator = ' > '): array
    {
        foreach ($data as $datum) {
            if ($datum['pid'] > 0) {
                $tree[$datum['id']] = ($tree[$datum['pid']] ?? '') . $separator . $datum['name'];
            } else {
                $tree[$datum['id']] = ' > ' . $datum['name'];
            }
            if (!empty($datum['_child'])) {
                self::toBreadcrumb($datum['_child'], $tree);
            }
            $tree[$datum['id']] = ltrim($tree[$datum['id']], $separator);
        }
        return $tree;
    }
}