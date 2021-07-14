NAF.schemas.getComponentsOriginal = NAF.schemas.getComponents;
NAF.schemas.getComponents = (template) => {
    if (!NAF.schemas.hasTemplate("#player-template")) {
        
        NAF.schemas.add({template: '#avatar-template', components: ['position', 'rotation', {selector: '.nametag', component: 'text', property: 'value'}]});
        NAF.schemas.add({template: '#player-template', components: ['position', 'rotation']});
        NAF.schemas.add({template: '#hand-l-template', components: ['position', 'rotation']});
        NAF.schemas.add({template: '#hand-r-template', components: ['position', 'rotation']});
        NAF.schemas.add({template: '#body-template', components: ['position', 'rotation', 'visible']});
        
    }
    const components = NAF.schemas.getComponentsOriginal(template);
    return components;
}