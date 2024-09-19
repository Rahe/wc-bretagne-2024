import {PanelBody, TextControl,} from '@wordpress/components';
import {InspectorControls, RichText, useBlockProps} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';

import "./index.scss";

export default function Edit({attributes: {prefix, suffix, content}, setAttributes}) {
    const onChangeContent = value => {
        setAttributes({content: value})
    }

    let render = (<div className="wc-bretagne-2024-container"><RichText
        tagName="p"
        placeholder={"Ecrivez du contenu"}
        value={content}
        className="wc-bretagne-content"
        onChange={onChangeContent}
    /></div>);


    if (prefix || suffix) {
        render = (<div className="wc-bretagne-2024-container">
            <span className="wc-bretagne-prefix">{prefix}</span><RichText
            tagName="p"
            placeholder={"Ecrivez du contenu"}
            value={content}
            className="wc-bretagne-content"
            disableLineBreaks={true}
            onChange={onChangeContent}
        /><span className="wc-bretagne-suffix">{suffix}</span>
        </div>);
    }

    return (
        <div {...useBlockProps()}>
            {render}
            <InspectorControls>
                <PanelBody
                    isOpened={true}
                    title="Configuration"
                    className="wc-bretagne-2024-panel"
                >
                    <TextControl label={"Préfixe"} className={"wc-bretagne-2024-prefix"} value={prefix} onChange={(value) => setAttributes({prefix: value})}/>
                    <TextControl label={"Suffixe"} className={"wc-bretagne-2024-suffix"} value={suffix} onChange={(value) => setAttributes({suffix: value})}/>
                </PanelBody>
            </InspectorControls>
        </div>
    );
}