import { Component, Input } from '@angular/core';
import { MatDialog, MatDialogRef } from '@angular/material';

@Component({
    selector: "location-field",
    templateUrl: "location-field.component.html",
    styleUrls: ["location-field.component.css"],
})
export class LocationFieldComponent {
    @Input() label: string;
    @Input() radiusOption: boolean = false;

    /**
     * Search radius in kilometer
     */
    private radius: number = 1;

    private matDialog: MatDialog;

    constructor(matDialog: MatDialog) {
        this.matDialog = matDialog;
    }

    openRadiusDialog() {
        const dialogReference = this.matDialog.open(RadiusSelectionList);
        dialogReference.afterClosed().subscribe(result => {
            if (!result) return;
            this.radius = result.radius;
        });
    }
}


@Component({
    template: `
        <button (click)="setRadius(1)">1 KM</button><br>
        <button (click)="setRadius(3)">3 KM</button><br>
        <button (click)="setRadius(5)">5 KM</button><br>
        <button (click)="setRadius(10)">10 KM</button><br>
    <div class="dialog-buttons">
        <button (click)="cancel()">Cancel</button>
    </div>`,
    styles: [`
        .dialog-buttons {margin: 1em 0;}
        button {min-width: 100px;}
    `]
})
export class RadiusSelectionList {
    dialogReference: MatDialogRef<RadiusSelectionList>;

    constructor(dialogReference: MatDialogRef<RadiusSelectionList>) {
        this.dialogReference = dialogReference;
    }

    setRadius(radius: number) {
        this.dialogReference.close({radius: radius});
    }

    cancel() {
        this.dialogReference.close();
    }
}