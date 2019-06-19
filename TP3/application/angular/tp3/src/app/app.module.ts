import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { ContentComponent } from './content/content.component';
import { CardComponent } from './card/card.component';
import { ModalComponent } from './modal/modal.component';
import { TagComponent } from './tag/tag.component';
import { AgmCoreModule } from '@agm/core';

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    SidebarComponent,
    ContentComponent,
    CardComponent,
    ModalComponent,
    TagComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyDhIBTBLNIeW4NzLu_yTRCrU67hgW8n3SI'
    })
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
