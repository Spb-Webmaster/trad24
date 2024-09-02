
export  function grid(){

    function resizeGridItem(item){
        let grid = document.getElementsByClassName("grid")[0];
        let  rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));
        let rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap'));
        let  rowSpan = Math.ceil((item.querySelector('.co').getBoundingClientRect().height+rowGap)/(rowHeight+rowGap));
        item.style.gridRowEnd = "span "+rowSpan;
    }

    function resizeAllGridItems(){
        let allItems = document.getElementsByClassName("mItem");
        let x;
        for(x=0;x<allItems.length;x++){
            resizeGridItem(allItems[x]);
        }
    }

    function resizeInstance(instance){
        let item = instance.elements[0];
        resizeGridItem(item);
    }

    window.onload = resizeAllGridItems();
    window.addEventListener("resize", resizeAllGridItems);

    let allItems = document.getElementsByClassName("mItem");
    let x;
    for(x=0;x<allItems.length;x++){
        imagesLoaded( allItems[x], resizeInstance);
    }

}

