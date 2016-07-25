# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)
该项目根据陈华老师PHP高端框架系列教程Laravel5.2框架（基础篇+实战篇）完成了一个简单的博客系统，包含前后端。
## 后端使用了UI框架Charisma
![image](https://github.com/lingyunju/blog/blob/master/public/img/login.png)
![image](https://github.com/lingyunju/blog/blob/master/public/img/admin1.png)
后台可支持9种风格切换，页面为响应式设计。
## 前台使用了教程案列上面的模板
![image](https://github.com/lingyunju/blog/blob/master/public/img/index.png)

## 项目总结
1、项目基本完成了日常生产中所能用到的一些知识点，包括项目目录结构规划设计，模板规划设计，公共数据的传递处理等，做完了该项目基本能解决在laravel项目中遇到的各类设计。
2、之前特别熟悉TP框架，刚开始看laravel的时候很不习惯，有一些思维跟TP框架或者其他的一些框架都不太一样。光看官方文档，学习起来很是吃力。
3、引入了中间件的概念，是一种新的思路，在TP中处理类似问题，通常需要去套一层控制器，中间件的设计给很多应用场景带来极大的方便。
4、数据迁移部分在日常的开发生活中不太可能用到，而且用代码来创建数据库，需要更多的时间不如用工具创建来的快和便捷。
5、门面（Facades）里面有很多实用的接口，但在视频里只是使用了Validator（验证），View等很少的几个，还有一些需要在实际应用中去探索使用。
6、需要对命名空间有深入的了解，很多的类或者库调用通过他完成。
7、教程中没有涉及到缓存的知识，一般在生产过程中都需要做数据缓存，以减轻数据库压力。我通过官方文档尝试使用了Memcached作为缓存。Cache 门面对于缓存的处理非常方便。
8、作为一个重量级的框架，需要学习和挖掘的内容还很多，有机会在实际项目中再去研究吧。。。