新增文件名称自增+1
新增文件时命名为日期+编号
日期相同时编号+1
先判断是否有名字相同的文件，如果有则编号+1
文件名组成为日期+编号
第一个新建文件名为日期：比如今天，为9021
第二个文件名为092101
第三个文件名为092102
当第二个文件新建时，判断是否存在文件名为0921的文件，如存在则新建文件名为092101的文件，命名组成方式是已有文件名+01/日期+编号
第三个文件新建是，判断是否存在文件名为0921的文件，如存在则判断是否存在文件名为092101的文件，知道新名称通过检查为止。