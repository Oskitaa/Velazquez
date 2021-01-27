import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AniadirPersonaComponent } from './aniadir-persona.component';

describe('AniadirPersonaComponent', () => {
  let component: AniadirPersonaComponent;
  let fixture: ComponentFixture<AniadirPersonaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AniadirPersonaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AniadirPersonaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
