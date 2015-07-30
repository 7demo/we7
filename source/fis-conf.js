// 开起 autuload, 好处是，依赖自动加载。
fis.config.set('modules.postpackager', 'autoload');
fis.config.set('settings.postpackager.autoload.type', 'requirejs');

// 设置成 amd 模式。
fis.config.set('modules.postprocessor.html', 'amd');
fis.config.set('modules.postprocessor.js', 'amd');
fis.config.set('settings.postprocessor.amd', {
    baseUrl: '.',

    // 查看：https://github.com/amdjs/amdjs-api/blob/master/CommonConfig.md#paths-
    // 不同的是，这是编译期处理，路径请填写编译路径。
    paths: {
        jquery: 'lib/components/jquery/jquery.js'
        // jmoblie: 'lib/components/jquerymobile/jquery.mobile-1.4.5.min.js'
        // app: './modules/app',
        // css: './modules/css.js'
    },

    // 查看：https://github.com/amdjs/amdjs-api/blob/master/CommonConfig.md#packages-
    // 不同的是，这是编译期处理，路径请填写编译路径。
    packages: [

        // {
        //     name: 'zrender',
        //     location: 'modules/libs/zrender',
        //     main: 'zrender'
        // },

        {
            name: 'index',
            location: '/lib/js/web/index',
            main: 'index'
        }
    ],

    // 设置 bootstrap 依赖 jquery
    // 更多用法见：https://github.com/amdjs/amdjs-api/blob/master/CommonConfig.md#shim-
    // key 为编译期路径。
    shim: {
        // 'lib/components/jquerymobile/jquery.mobile-1.4.5.min.js': ['jquery']
    }
});

// 使用 depscombine 是因为，在配置 pack 的时候，命中的文件其依赖也会打包进来。
fis.config.set('modules.packager', 'depscombine');


fis.config.set('settings.spriter.csssprites.margin', 20);
fis.config.set('livereload.port', '8313');
//scss后缀的文件，用fis-parser-sass插件编译
fis.config.set('modules.parser.scss', 'sass');
//scss文件产出为css文件
fis.config.set('roadmap.ext.scss', 'css');

fis.config.set('pack', {
    '/Public/css/main.css': [
        '/lib/css/**.scss'
    ],

    // js
    // 依赖也会自动打包进来, 且可以通过控制前后顺来来定制打包，后面的匹配结果如果已经在前面匹配过，将自动忽略。
    '/Public/js/index.js': ['/lib/js/web/index.js']

    // 'pkg/bootstrap_jquery.js': ['lib/components/bootstrap/js/bootstrap.js']
});

fis.config.set('roadmap.path', [

    // {
    //     reg: /\/_[^\/]*?$/i,
    //     release: false
    // },
    {
        reg: '**.scss',
        useSprite: true
    }

    // 标记 isMod 为 true, 这样，在 modules 里面的满足 commonjs 规范的 js 会自动包装成 amd js, 以至于能在浏览器中运行。
    //
    // {
    //     reg: /^\/lib\/(.*\.js)$/i,
    //     isMod: true,
    //     release: '/lib\/$1'
    // }
]);

fis.config.merge({
    settings:{
        parser:{
            scss:{outputStyle:'compact'}
        }
    },
    roadmap : {
        path : [
            {
                //所有html页面
                reg : /\/view\/(.*\.html)$/i,
                //发布到/static/pic/xxx目录下
                release : '/Application/Web/View/$1'
                //访问url是/oo/static/baidu/xxx
            }
        ]
    }
});

fis.config.set('settings.postpackager.simple.autoCombine', true);
fis.config.set('settings.postpackager.simple.autoReflow', true);
