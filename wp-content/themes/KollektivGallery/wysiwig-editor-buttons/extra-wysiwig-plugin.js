//(function() {
//    tinymce.create('tinymce.plugins.FemurButtons', {
//        /**
//         * Initializes the plugin, this will be executed after the plugin has been created.
//         * This call is done before the editor instance has finished it's initialization so use the onInit event
//         * of the editor instance to intercept that event.
//         *
//         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
//         * @param {string} url Absolute URL to where the plugin is located.
//         */
//        init : function(ed, url) {
//
//            /**
//             * Add the button for pullquote
//             */
//            ed.addButton('pullquote', {
//                title : 'Pullquote',
//                cmd : 'pullquote',
//                image : url + '/pullquote.png'
//            });
//
//            /**
//             * Add the command for pullquote
//             */
//            ed.addCommand('pullquote', function() {
//                var selected_text = ed.selection.getContent();
//                var return_text = '';
//                return_text = '<span class="pullquote">' + selected_text + '</span>';
//                ed.execCommand('mceInsertContent', 0, return_text);
//            });
//
//
//            /**
//             * Add the button for Blog Post Container
//             */
//            ed.addButton('blogPostContainer', {
//                title : 'Blog Post Container',
//                cmd : 'blogPostContainer',
//                image : url + '/blog-post-container.png'
//            });
//
//            /**
//             * Add the command for Blog Post Container
//             */
//            ed.addCommand('blogPostContainer', function() {
//                var selected_text = ed.selection.getContent();
//                var return_text = '';
//                return_text = '<span class="blog-post-container">' + selected_text + '</span>';
//                ed.execCommand('mceInsertContent', 0, return_text);
//            });
//
//
//
//            /**
//             * Add button for show recent posts
//             */
//            ed.addButton('showRecent', {
//                title : 'Add recent posts shortcode',
//                cmd : 'showRecent',
//                image : url + '/recent.png'
//            });
//
//            /**
//             * Add command for show recent posts
//             */
//            ed.addCommand('showRecent', function() {
//                var number = prompt("How many posts you want to show ? "),
//                    shortcode;
//                if (number !== null) {
//                    number = parseInt(number);
//                    if (number > 0 && number <= 20) {
//                        shortcode = '[recent-post number="' + number + '"/]';
//                        ed.execCommand('mceInsertContent', 0, shortcode);
//                    }
//                    else {
//                        alert("The number value is invalid. It should be from 0 to 20.");
//                    }
//                }
//            });
//        },
//
//        /**
//         * Creates control instances based in the incomming name. This method is normally not
//         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
//         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
//         * method can be used to create those.
//         *
//         * @param {String} n Name of the control to create.
//         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
//         * @return {tinymce.ui.Control} New control instance or null if no control was created.
//         */
//        createControl : function(n, cm) {
//            return null;
//        },
//
//        /**
//         * Returns information about the plugin as a name/value array.
//         * The current keys are longname, author, authorurl, infourl and version.
//         *
//         * @return {Object} Name/value array containing information about the plugin.
//         */
//        getInfo : function() {
//            return {
//                longname : 'Femur Additional WYSIWIG Buttons',
//                author : 'Luke Phillips',
//                authorurl : 'https://github.com/lukephills',
//                infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/example',
//                version : "0.1"
//            };
//        }
//    });
//
//    // Register plugin
//    tinymce.PluginManager.add( 'femur', tinymce.plugins.FemurButtons );
//})();


(function() {
    tinymce.PluginManager.add('femur', function( editor, url ) {
        editor.addButton( 'lorumIpsum', {
            image: url + '/lorum-ipsum.png',
            value: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quantum Aristoxeni ingenium consumptum videmus in musicis? Atqui reperies, inquit, in hoc quidem pertinacem; Quamquam haec quidem praeposita recte et reiecta dicere licebit. Nec enim, omnes avaritias si aeque avaritias esse dixerimus, sequetur ut etiam aequas esse dicamus. Quae cum ita sint, effectum est nihil esse malum, quod turpe non sit. Isto modo ne improbos quidem, si essent boni viri. Nam si amitti vita beata potest, beata esse non potest. Quod equidem non reprehendo; Nam his libris eum malo quam reliquo ornatu villae delectari.',
            onclick: function() {
                editor.insertContent(this.value());
            }
        }),

        editor.addButton( 'pullquote', {
            image: url + '/pullquote.png',
            title : 'Pullquote',
            onclick: function() {
                var selected_text = editor.selection.getContent();
                var return_text = '';
                return_text = '<span class="pullquote">' + selected_text + '</span>';
                editor.execCommand('mceInsertContent', 0, return_text);
            }
        }),

        editor.addButton( 'blogPostContainer', {
            image: url + '/blog-post-container.png',
            title : 'Blog Post Container',
            onclick: function() {
                var selected_text = editor.selection.getContent();
                var return_text = '';
                return_text = '<span class="blog-post-container">' + selected_text + '</span>';
                editor.execCommand('mceInsertContent', 0, return_text);
            }
        }),

        editor.addButton( 'subscribe', {
            image: url + '/subscribe.png',
            title : 'Show subscribe box',
            onclick: function() {
                var shortcode;

                shortcode = '[subscribe /]';
                editor.execCommand('mceInsertContent', 0, shortcode);
            }
        });

    });
})();