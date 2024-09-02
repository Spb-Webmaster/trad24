import {
    ClassicEditor,
    AccessibilityHelp,
    AutoLink,
    Autosave,
    Bold,
    Code,
    Essentials,
    GeneralHtmlSupport,
    Heading,
    HtmlEmbed,
    Italic,
    Link,
    List,
    ListProperties,
    Paragraph,
    SelectAll,
    ShowBlocks,
    SourceEditing,
    TodoList,
    Undo
} from 'ckeditor5';

//import translations from 'ckeditor5/dist/translations/ru';

import 'ckeditor5/ckeditor5.css';
import './style.css';

const editorConfig = {
    toolbar: {
        items: [
            'undo',
            'redo',
            '|',
            'sourceEditing',
            'showBlocks',
            'selectAll',
            '|',
            'heading',
            '|',
            'bold',
            'italic',
            'code',
            '|',
            'link',
            'htmlEmbed',
            '|',
            'bulletedList',
            'numberedList',
            'todoList',
            '|',
            'accessibilityHelp'
        ],
        shouldNotGroupWhenFull: false
    },
    plugins: [
        AccessibilityHelp,
        AutoLink,
        Autosave,
        Bold,
        Code,
        Essentials,
        GeneralHtmlSupport,
        Heading,
        HtmlEmbed,
        Italic,
        Link,
        List,
        ListProperties,
        Paragraph,
        SelectAll,
        ShowBlocks,
        SourceEditing,
        TodoList,
        Undo
    ],
    heading: {
        options: [
            {
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph'
            },
            {
                model: 'heading1',
                view: 'h1',
                title: 'Heading 1',
                class: 'ck-heading_heading1'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading 2',
                class: 'ck-heading_heading2'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading 3',
                class: 'ck-heading_heading3'
            },
            {
                model: 'heading4',
                view: 'h4',
                title: 'Heading 4',
                class: 'ck-heading_heading4'
            },
            {
                model: 'heading5',
                view: 'h5',
                title: 'Heading 5',
                class: 'ck-heading_heading5'
            },
            {
                model: 'heading6',
                view: 'h6',
                title: 'Heading 6',
                class: 'ck-heading_heading6'
            }
        ]
    },
    htmlSupport: {
        allow: [
            {
                name: /^.*$/,
                styles: true,
                attributes: true,
                classes: true
            }
        ]
    },
 /*   initialData:
        '',*/
    language: 'ru',
    link: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        decorators: {
            toggleDownloadable: {
                mode: 'manual',
                label: 'Downloadable',
                attributes: {
                    download: 'file'
                }
            }
        }
    },
    list: {
        properties: {
            styles: true,
            startIndex: true,
            reversed: true
        }
    },
    placeholder: 'Пишите ...',
   // translations: [translations]
};

if(document.getElementById("editor")) {
    ClassicEditor.create(document.querySelector('#editor'), editorConfig);
}
